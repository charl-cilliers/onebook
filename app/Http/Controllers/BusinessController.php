<?php

namespace App\Http\Controllers;

use App\Http\Services\BusinessService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BusinessController extends BaseWebController
{

    private $businessService;

    public function __construct(BusinessService $businessService) {
        $this->businessService = $businessService;
    }

    public function register(Request $request) {
        $business = $request->session()->get('business');
        return view('business.register', compact('business',$business));
    }

    public function registerBusiness() {
        $request = new \Illuminate\Http\Request(Input::all());
        $validation_rules = array(
            'name'=>'required|string',
            'email'=>'required|string',
            'industry'=>'required|string',
            'description'=>'required|string',
            'location'=>'required|string',
            'password'=>'required|confirmed|min:8|max:32',
        );

        $this->validateRequest($request, $validation_rules);

        $array = $this->registerBusiness($request->input());

        return redirect('/business/register1');
    }

    public function serviceProviders (Request $request) {
        $business = $request->session()->get('business');
        return view('business.register1', compact('business',$business));
    }

    public function postServiceProviders (Request $request) {
        $validation_rules = array(
            'user.name'=>'required|string',
            'user.surname'=>'required|string',
        );

        $this->validateRequest($request, $validation_rules);

        $array = $this->registerProviders($request->input());

        return redirect('/business/register2');
    }

}
