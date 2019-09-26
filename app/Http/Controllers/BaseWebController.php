<?php

namespace App\Http\Controllers;

use App\Exceptions\ValidationException;
use App\Http\Controllers\Controller;
use App\Http\Responses\StandardResponse;
use Illuminate\Http\Request;
use Validator;

class BaseWebController extends Controller
{
    public function __construct() {

    }

    /**
     * @param Request $request
     * @param $validationRules
     * @throws ValidationException
     */
    public function validateRequest(Request $request, $validationRules) {
        $validator = Validator::make($request->input(), $validationRules);

        if ($validator->fails()) {
            throw new ValidationException($validator->messages()->toArray());
        }
    }

    protected function response($responseData = null) {
        return new StandardResponse($responseData);
    }
}
