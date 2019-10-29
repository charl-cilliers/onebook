<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('user/login', 'UserController@login');
Route::post('user/register', 'UserController@register');
            
Route::group(['middleware' => ['auth.user']], function() {
    Route::post('user/login', 'UserController@login');
});
Route::group(['middleware' => ['auth.device']], function() {
    Route::put('user/editUser','UserController@editUser');
    Route::put('user/changePassword','UserController@changePassword');
    Route::get('user/getTotalAppointments','UserController@getTotalAppointments');
});
Route::get('user/checkVerify','UserController@checkVerify');

Route::post('user/sendVerify', 'UserController@sendVerify');

Route::get('email/verify', 'VerificationApiController@verify')->name('verificationapi.verify');
Route::get('email/resend', 'VerificationApiController@resend')->name('verificationapi.resend');

Route::post('login', 'UsersApiController@login');
Route::post('register', 'UsersApiController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'UsersApiController@details')->middleware('verified');
}); // will work only when user has verified the email

Route::group([
    'namespace' => 'Auth',
    'middleware' => 'api',
    'prefix' => 'password'
], function () {
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});
