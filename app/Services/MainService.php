<?php

namespace App\Services;

use App\Services\BaseService;
use App\Repositories\MainRepository;
use App\Constants\ApiConstants;
use App\Constants\GuzzleConstants;
use App\Constants\LogConstants;
use App\Helpers\LogEyeHelper;

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

        if (is_array($mResult) === false) {
            $aLogData = LogEyeHelper::formatLogData(
                ApiConstants::REQUEST_TYPE_COUNTRY_LIST,
                GuzzleConstants::REQUEST_METHOD['get'],
                ApiConstants::COUNTRY_API_BASE_URL . ApiConstants::COUNTRY_API_LIST_ENDPOINT,
                $aApiResult['code'], 
                $aApiResult['message']);

            LogEyeHelper::storeLogs($aLogData, LogConstants::LEVEL_TYPE_INFO, LogConstants::TITLE_FAILURE);

            return [];
        }

        $aLogData = LogEyeHelper::formatLogData(
            ApiConstants::REQUEST_TYPE_COUNTRY_LIST,
            GuzzleConstants::REQUEST_METHOD['get'],
            ApiConstants::COUNTRY_API_BASE_URL . ApiConstants::COUNTRY_API_LIST_ENDPOINT,
            ApiConstants::RESPONSE_CODE_SUCCESS,
            ApiConstants::SUCCESS_MESSAGE);

        LogEyeHelper::storeLogs($aLogData, LogConstants::LEVEL_TYPE_INFO, LogConstants::TITLE_SUCCESS);

        return $mResult;
    }

    /**
     * Function to search weather status of specific location
     * @param $aData
     * @return array
     */
    public function searchWeatherStatus($aData)
    {
        if (is_numeric($aData['latitude']) === false || is_numeric($aData['longitude']) === false) {
            $aLogData = LogEyeHelper::formatLogData(
                ApiConstants::REQUEST_TYPE_WEATHER_STATUS,
                GuzzleConstants::REQUEST_METHOD['get'],
                ApiConstants::OPEN_WEATHER_MAP_BASE_URL . ApiConstants::OPEN_WEATHER_MAP_SEARCH_ENDPOINT,
                ApiConstants::REPONSE_CODE_BAD_REQUEST,
                ApiConstants::ERROR_INVALID_PARAMETER);

            LogEyeHelper::storeLogs($aLogData, LogConstants::LEVEL_TYPE_INFO, LogConstants::TITLE_FAILURE);
            
            return $this->returnResponse(ApiConstants::REPONSE_CODE_BAD_REQUEST, ApiConstants::ERROR_INVALID_PARAMETER, []);
        }

        $aApiResult = $this->oRepository->searchWeatherStatus($aData);
        
        $mResult =  $this->validateApiResult($aApiResult);

        if ($mResult === false) {
            $aLogData = LogEyeHelper::formatLogData(
                ApiConstants::REQUEST_TYPE_WEATHER_STATUS,
                GuzzleConstants::REQUEST_METHOD['get'],
                ApiConstants::OPEN_WEATHER_MAP_BASE_URL . ApiConstants::OPEN_WEATHER_MAP_SEARCH_ENDPOINT,
                $aApiResult['code'],
                $aApiResult['message']);

            LogEyeHelper::storeLogs($aLogData, LogConstants::LEVEL_TYPE_INFO, LogConstants::TITLE_FAILURE);
            
            return $this->returnResponse($aApiResult['code'], ApiConstants::ERROR_FETCH_WEATHER_STATUS_FAILED, []);
        }

        $aLogData = LogEyeHelper::formatLogData(
            ApiConstants::REQUEST_TYPE_WEATHER_STATUS,
            GuzzleConstants::REQUEST_METHOD['get'],
            ApiConstants::OPEN_WEATHER_MAP_BASE_URL . ApiConstants::OPEN_WEATHER_MAP_SEARCH_ENDPOINT,
            ApiConstants::RESPONSE_CODE_SUCCESS,
            ApiConstants::SUCCESS_MESSAGE);

        LogEyeHelper::storeLogs($aLogData, LogConstants::LEVEL_TYPE_INFO, LogConstants::TITLE_SUCCESS);
        
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
