<?php

namespace App\Http\Controllers;

use App\Exceptions\ValidationException;
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

    public function sendVerify(Request $request) {
        $user = User::find($request['user_id']);
        $email = $request['email'];
        \Log::info($user);
        \Log::info($email);
        if($user != NULL) {
            if($user->email == $email) {
                return $this->userService->sendEmail($user);
            } else {
                $user->email = $email;
                $user->save();
                return $this->userService->sendEmail($user);
            }
        } else {
            throw new ValidationException(['User does not exist']);
        }
    }

    public function editUser(Request $request) {
        $validation_rules = array(
            'user_id' => 'required',
            'name' => 'sometimes|string|nullable',
            'surname'=> 'sometimes|string',
            'mobile_number'=> 'required|regex:^\+27[0-9]{9}$^',
            'email'=>'required|string'
        );

        $this->validate($request, $validation_rules);

        return $this->userService->editUser($request);

    }

    public function checkVerify (Request $request) {
        $user = User::find($request['user_id']);
        $verified = $user->verified;
        return $this->response(['verified'=>$verified]);
    }

    public function changePassword (Request $request) {
        $validation_rules = array(
            'user_id' => 'required',
            'current_password'=>'required|min:8|max:32',
            'password'=>'required|confirmed|min:8|max:32'
        );

        $this->validate($request, $validation_rules);

        return $this->userService->changePassword($request);
    }

    public function getTotalAppointments (Request $request) {
        $validation_rules = array(
            'user_id' => 'required'
        );

        $this->validate($request, $validation_rules);

        return $this->userService->getTotalAppointments($request);
    }
}
