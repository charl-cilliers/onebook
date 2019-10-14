<?php

namespace App\Http\Controllers;

use App\User;
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
            'user.surname'=>'required|string',
            'user.email'=>'required|string',
            'user.mobile_number' => 'required|regex:^\+27[0-9]{9}$^',
            'user.password'=>'required|min:8|max:32',
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

    public function resetPassword(Request $request) {
        $user = User::find($request['id']);

    }
}
