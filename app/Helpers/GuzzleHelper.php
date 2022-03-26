<?php

namespace App\Helpers;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class GuzzleHelper
 * @package App\Helpers
 * @author Junnel Miguel
 * @version 1.0
 * @since 3/26/2022
 */
class GuzzleHelper
{
    /**
     * Function to send api request
     * @param string     $sRequestType
     * @param string     $sUri
     * @param array      $aRequest
     * @param array|null $aHeader
     * @return array|string
     * @throws GuzzleException
     */
    static function request(string $sRequestType, string $sUri, array $aRequest, array $aHeader = null)
    {
        try {
            $oClient = new Client(['verify' => false, 'headers' => $aHeader]);
            $oResponse = $oClient->request($sRequestType, $sUri, $aRequest);
            $mResponse = [
                'data' => json_decode($oResponse->getBody()->getContents(), true)
            ];
        } catch (ClientException $e) {
            $mResponse = [
                'code'      => $e->getCode(),
                'message'   => $e->getResponse()->getBody()->getContents()
            ];
        } catch (Exception $e) {
            $mResponse = [
                'code'      => $e->getCode(),
                'message'   => $e->getMessage()
            ];
        }
        
        return $mResponse;
    }
}
