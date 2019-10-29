<?php

namespace App\Http\Controllers;

use App\Http\Services\BusinessService;
use HttpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use View;

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

    public function registerBusiness(Request $request) {
        $validation_rules = array(
            'name'=>'required|string',
            'email'=>'required|string',
            'industry'=>'required|string',
            'description'=>'required|string',
            'location'=>'required|string',
            'password'=>'required|confirmed|min:8|max:32',
        );

        $this->validateRequest($request, $validation_rules);

        $array = $this->businessService->registerBusiness($request->input());

        return redirect()->route('getRegister2');
    }

    public function serviceProviders (Request $request) {
        $provider = $request->session()->get('provider');
        return view('business.registerProvider', compact('provider',$provider));
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
