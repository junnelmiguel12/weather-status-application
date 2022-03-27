<?php

namespace App\Constants;

/**
 * Class ApiConstants
 * @package App\Contants
 * @author Junnel Miguel
 * @version 1.0
 * @since 3/26/2022
 */
class ApiConstants
{
    const COUNTRY_API_BASE_URL = 'https://restcountries.com';
    const COUNTRY_API_LIST_ENDPOINT = '/v3.1/all';
    
    const OPEN_WEATHER_MAP_BASE_URL = 'https://api.openweathermap.org';
    const OPEN_WEATHER_MAP_SEARCH_ENDPOINT = '/data/2.5/weather?'; 

    const RESPONSE_CODE_SUCCESS = 200;
    const REPONSE_CODE_BAD_REQUEST = 400;

    const ERROR_INVALID_PARAMETER = 'Invalid parameters.';
    const ERROR_FETCH_WEATHER_STATUS_FAILED = 'Something went wrong with the request.';
    const SUCCESS_MESSAGE = 'Success.';

    const REQUEST_TYPE_COUNTRY_LIST = 'country-list';
    const REQUEST_TYPE_WEATHER_STATUS ='weather-status';
}
