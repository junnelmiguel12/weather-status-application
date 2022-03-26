<?php

namespace App\Constants;

/**
 * Class GuzzleConstants
 * @package App\Constants
 * @author Junnel Miguel
 * @version 1.0
 * @since 3/26/2022
 */
class GuzzleConstants
{
    const REQUEST_METHOD = [
        'get'    => 'GET',
        'post'   => 'POST',
        'put'    => 'PUT',
        'delete' => 'DELETE'
    ];

    const KEY_FORM_PARAMS = 'form_params';
    const HEADER_KEY_CONTENT_TYPE = 'Content-Type';
    const CONTENT_TYPE_JSON = 'application/json';
    const HEADER_AUTHORIZATION = 'Authorization';
    const REQUEST_KEY_BODY = 'body';
    const KEY_QUERY = 'query';
    const BEARER = 'Bearer %s';
    const REQUEST = 'request';
}
