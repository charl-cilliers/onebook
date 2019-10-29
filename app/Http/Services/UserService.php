<?php

namespace App\Http\Services;

use App\Appointment;
use App\Device;
use App\Exceptions\AuthorizationException;
use App\Exceptions\NoDeviceException;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Hash;

class UserService extends BaseService{

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

        $user->save();

        return ['user'=>$user, 'device' => $device, 'access_token' => $access_token];
    }

    public function login($request){

        $user = Auth::user();
        $device = $this->createAndLinkDevice($user, $request);

        return ['user'=>$user,'device_id'=>$device->device_id,'access_token'=>$device->getAccessToken()];
    }

    protected function matchPassword($password) {
        $user = Auth::user();
        return Hash::check($password, $user->password);
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

    public function sendEmail (User $user) {
        $user->sendApiEmailVerificationNotification();
        $success['message'] = 'Please confirm yourself by clicking on verify user button sent to you on your email';
        $token = $this->broker()->createToken($user);
        $user->verify_token = $token;
        $user->save();
        return $this->response(['user'=>$user]);
    }

    public function editUser ($request) {
        $user = User::find($request['user_id']);

        if (strlen($request['name']) > 0) {
            $user->name = $request['name'];
        }

        if (strlen($request['surname']) > 0) {
            $user->surname = $request['surname'];
        }

        if (strlen($request['mobile_number']) > 0) {
            $user->mobile_number = $request['mobile_number'];
        }

        if (strlen($request['email']) > 0) {
            $user->email = $request['email'];
            $user->verified = 0;
            $user->email_verified_at = NULL;
        }

        $user->save();

        return $this->response(['user'=>$user]);
    }

    public function changePassword ($request) {
        $user = User::find($request['user_id']);

        if (isset($request['current_password']) && !$this->matchPassword($request['current_password'])) {
            throw new AuthorizationException('Current password incorrect.', 'Authorization error');
        }

        $user->password = bcrypt($request['password']);
        $user->save();

        return $this->response(['user'=>$user]);
    }

    public function getTotalAppointments ($request) {
        $user = User::find($request['user_id']);
        $appointments = Appointment::where('user_id',$request['user_id'])->get();
        $count = 0;

        foreach ($appointments as $appointment) {
            $count += 1;
        }
        return $this->response(['user'=>$user,'total appointments'=>$count]);
    }
}
