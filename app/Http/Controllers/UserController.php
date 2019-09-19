<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserService;

class UserController extends BaseApiController
{
    private $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function register(Request $request) {
        $validation_rules = array(
            'user.name'=>'required|string',
            'user.email'=>'required|string',
            'user.password'=>'required|confirmed|min:8|max:32',
            'device.device_id'=>'required',
            'device.type'       =>'required',
            'device.version'    =>'required',
            'device.push_token' =>'sometimes|string'
        );

        $this->validateRequest($request, $validation_rules);

        return $this->response($this->userService->register($request->input()));
    }

    public function login(Request $request) {
        $validation_rules = array(
            'device_id' =>'required',
            'type'      =>'required',
            'version'   =>'required',
            'push_token'=>'sometimes|string'
        );

        $this->validateRequest($request, $validation_rules);

        return $this->response($this->userService->login($request->input()));
    }
}
