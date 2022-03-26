<?php

namespace App\Repositories\Api;

/**
 * Class baseApi
 * @package App\Repositories\Api
 * @author Junnel Miguel
 * @version 1.0
 * @since 3/26/2022
 */
 class BaseApi
 {
    /**
     * For base api url
     */
    protected $sApiBaseUrl;

    /**
     * for api path
     */
    protected $sApiPath;

    /**
     * for search weather status api parameters
     */
    protected $sOpenWeatherMapSearchParams = 'lat=%s&lon=%s&appid=%s';
 }
