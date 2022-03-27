<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class LogEyeHelper
 * @package App\Services
 * @author Junnel Miguel
 * @version 1.0
 * @since 3/27/2022
 */
class LogEyeHelper
{
    /**
     * Function to format log data
     * @param $sRequest
     * @param $iCode
     * @param $sMessage
     * @return array
     */
    public static function formatLogData($sRequest, $sMethod, $sEndpoint, $iCode, $sMessage)
    {
        return [
            'request_type' => $sRequest,
            'request' => [
                'method'   => $sMethod,
                'endpoint' => $sEndpoint
            ],
            'response' => [
                'code'    => $iCode,
                'message' => $sMessage
            ]
        ];
    }

    /**
     * Function to store log
     * @param mixed  $mMessage
     * @param string $sLevelName
     * @param string $sTitle
     */
    public static function storeLogs($mMessage, $sLevelName, $sTitle)
    {
        if (is_array($mMessage)!== true) {
            $mMessage = [
                'context' => $mMessage
            ];
        }

        Log::{$sLevelName}($sTitle, $mMessage);
    }
}
