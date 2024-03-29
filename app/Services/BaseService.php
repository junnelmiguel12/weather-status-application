<?php

namespace App\Services;

/**
 * Class BaseService
 * @package App\Services
 * @author Junnel Miguel
 * @version 1.0
 * @since 3/26/2022
 */
class BaseService
{
    /**
     * Object variable for repository
     */
    private $oRepository;

    /**
     * Array variable for returning result
     */
    protected $aResult = [];

    /**
     * Function to validate api result
     * @param $mResult
     * @return mixed
     */
    protected function validateApiResult($mResult)
    {
        return array_key_exists('code', $mResult) === true ? false : $mResult['data'];
    }
}
