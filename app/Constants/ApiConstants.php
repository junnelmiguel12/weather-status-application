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
    
    const OPENWEATHERMAP_BASE_URL = 'https://api.openweathermap.org';
    const OPEN_WEATHER_MAP_SEARCH_ENDPOINT = '/data/2.5/weather?'; 

    protected $sOpenWeatherMapSearchParams = 'lat=%s&lon=%s&appid=%s';
}
