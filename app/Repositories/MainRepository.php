<?php

namespace App\Repositories;

use App\Repositories\Api\ApiOperations\GetRequest;
use App\Repositories\Api\BaseApi;
use App\Helpers\GuzzleHelper;
use App\Constants\ApiConstants;

/**
 * Class MainRepository
 * @package App\Repositories
 * @author Junnel Miguel
 * @version 1.0
 * @since 3/26/2022
 */
class MainRepository extends BaseApi
{
    use getRequest;

    /**
     * Function to send api get request for country list
     * @return array
     */
    public function getCountryList()
    {
        $this->sApiBaseUrl = ApiConstants::COUNTRY_API_BASE_URL;
        $this->sApiPath = ApiConstants::COUNTRY_API_LIST_ENDPOINT;

        return $this->getRequest();
    }

    /**
     * Function to send api ge request for weather status of specific location
     * @param $aData
     * @return array
     */
    public function searchWeatherStatus($aData)
    {
        $this->sApiBaseUrl = ApiConstants::OPEN_WEATHER_MAP_BASE_URL;
        $this->sApiPath = ApiConstants::OPEN_WEATHER_MAP_SEARCH_ENDPOINT . 
        sprintf($this->sOpenWeatherMapSearchParams, $aData['latitude'], $aData['longitude'], env('OPEN_WEATHER_MAP_USER_APP_ID'));
        
        return $this->getRequest();
    }
}