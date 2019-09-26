<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
//    return view('login');
});

Route::get('/test', function() {
    return 5;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('register-step1','BusinessController@register')->name('getRegister');
Route::post('register-step1', 'BusinessController@registerBusiness')->name('postRegister');

Route::get('/business/register-step2', 'BusinessController@serviceProviders')->name('getRegister2');
Route::post('/business/register-step2', 'BusinessController@postServiceProviders')->name('postRegister2');
