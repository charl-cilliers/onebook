<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
class UsersApiController extends Controller
{
    use VerifiesEmails;
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            if($user->email_verified_at !== NULL){
                $success['message'] = 'Login successfull';
            return response()->json(['success' => $success], $this-> successStatus);
        }else{
                return response()->json(['error'=>'Please Verify Email'], 401);
        }
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
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
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->sendApiEmailVerificationNotification();
        $success['message'] = 'Please confirm yourself by clicking on verify user button sent to you on your email';
        return response()->json(['success'=>$success], $this-> successStatus);
        }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }
}
