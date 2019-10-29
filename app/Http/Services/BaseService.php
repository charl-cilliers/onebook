<?php

namespace App\Http\Services;


use App\Http\Responses\StandardResponse;

class BaseService {
    // Just in case we need to do something in the future
    protected function response($responseData = null){
        return new StandardResponse($responseData);
    }
}