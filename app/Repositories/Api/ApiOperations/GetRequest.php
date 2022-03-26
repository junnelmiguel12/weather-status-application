<?php

namespace App\Repositories\Api\ApiOperations;

use App\Helpers\GuzzleHelper;
use App\Constants\GuzzleConstants as constant;

/**
 * trait GetRequest
 * @package App\Repositories\Api\ApiOperations
 * @author Junnel Miguel
 * @version 1.0
 * @since 3/26/2022
 */
 trait GetRequest
 {
     /**
     * Create a get request
     * @param $mRequest
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
     public function getRequest($mRequest = [])
     {
        $sUrl = $this->sApiBaseUrl . $this->sApiPath;

        if (empty($mRequest) === false) {
            $mRequest = [constant::KEY_FORM_PARAMS => $mRequest];
        }

        return GuzzleHelper::request(constant::REQUEST_METHOD['get'], $sUrl, $mRequest);
     }
 }
