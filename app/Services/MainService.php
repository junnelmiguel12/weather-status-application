<?php

namespace App\Services;

use App\Services\BaseService;
use App\Repositories\MainRepository;
use App\Constants\ApiConstants;

/**
 * Class mainService
 * @package App\Services
 * @author Junnel Miguel
 * @version 1.0
 * @since 3/26/2022
 */
class MainService extends BaseService
{
    /**
     * Instantiate mainRepository
     * @param $oRepository
     */
    public function __construct(MainRepository $oRepository)
    {
        $this->oRepository = $oRepository;
    }

    /**
     * Function to display country list
     * @return array
     */
    public function index()
    {
        $aApiResult = $this->oRepository->getCountryList();

        $mResult =  $this->validateApiResult($aApiResult);

        return is_array($mResult) === true && empty($mResult) === false ? $mResult : [];
    }

    /**
     * Function to search weather status of specific location
     * @param $aData
     * @return array
     */
    public function searchWeatherStatus($aData)
    {
        if (is_numeric($aData['latitude']) === false || is_numeric($aData['longitude']) === false) {
            return $this->returnResponse(ApiConstants::REPONSE_CODE_BAD_REQUEST, ApiConstants::ERROR_INVALID_PARAMETER, []);
        }

        $aApiResult = $this->oRepository->searchWeatherStatus($aData);
        
        $mResult =  $this->validateApiResult($aApiResult);

        if ($mResult === false) {
            return $this->returnResponse($aApiResult['code'], ApiConstants::ERROR_FETCH_WEATHER_STATUS_FAILED, []);
        }

        return $this->returnResponse(ApiConstants::RESPONSE_CODE_SUCCESS, ApiConstants::SUCCESS_MESSAGE, $mResult);
    }

    /**
     * Function to set return response in the view
     * @param $bResult
     * @param $sMessage
     * @param $mData
     * @return array
     */
    private function returnResponse($iCode, $sMessage, $mData = [])
    {
        $this->aResult['code']    = $iCode;
        $this->aResult['message'] = $sMessage;
        $this->aResult['data']    = $mData;

        return $this->aResult;
    }
}
