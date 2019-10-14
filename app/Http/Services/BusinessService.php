<?php

namespace App\Http\Services;

use App\Business;
use App\Device;
use App\Exceptions\NoDeviceException;
use App\User;
use Auth;

class BusinessService {

    public function __construct() {
        //
    }

    public function registerBusiness($request) {
        $business = $this->createBusiness($request);

        return ['business'=>$business];
    }

    public function login($request){

        $user = Auth::user();
        $device = $this->createAndLinkDevice($user, $request);

        return ['user'=>$user,'device_id'=>$device->device_id,'access_token'=>$device->getAccessToken()];
    }

    protected function createUser(array $user) {
        $user = new User($user);
        $user->password = bcrypt($user['password']);
        $user->save();
        return $user;
    }

    protected function createBusiness(array $business) {
        $business = new Business($business);
        $business->password = bcrypt($business['password']);
        $business->save();
        return $business;
    }

    protected function createAndLinkDevice(User $user, $deviceData) {
        $device = Device::where('device_id',  $deviceData['device_id'])->first();
        if (!is_null($device)) {
            $device->delete();
        }

        $device = new Device($deviceData);
        $device->setAccessToken();
        $device->user()->associate($user);
        $device->save();
        return $device;
    }
}
