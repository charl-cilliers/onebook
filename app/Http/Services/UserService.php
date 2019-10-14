<?php

namespace App\Http\Services;

use App\Device;
use App\Exceptions\NoDeviceException;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class UserService {

    use SendsPasswordResetEmails;

    public function __construct() {
        //
    }

    public function register($request) {
        $user = $this->createUser($request['user']);
        $device = null;
        if (!is_null($user)) {
            $device = $this->createAndLinkDevice($user, $request['device']);
            if (!$device) {
                $user->delete();
            }
            $access_token = $device->getAccessToken();
        }

        if (!$device) {
            throw new NoDeviceException('Error creating the device');
        }
        $user->sendApiEmailVerificationNotification();
        $success['message'] = 'Please confirm yourself by clicking on verify user button sent to you on your email';
        $token = $this->broker()->createToken($user);
        $user->verify_token = $token;
        $user->save();

        return ['user'=>$user, 'device' => $device, 'access_token' => $access_token, 'verify token' => $token, 'success' => $success];
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
