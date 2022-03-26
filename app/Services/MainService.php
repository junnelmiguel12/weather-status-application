<?php

namespace App\Services;

use App\Services\BaseService;
use App\Repositories\MainRepository;

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
        $mApiResult = $this->oRepository->getCountryList();

        $mResult =  $this->validateApiResult($mApiResult);

        return is_array($mResult) === true && empty($mResult) === false ? $mResult : [];
    }
}