<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;

class InformationsController extends Controller
{
    public function audittrail(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/audittrail';
        $response = $service->get($url);
        //dd($response);
        return view('information.audittrail',compact('response'));
    }
    public function invalidwording(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/invalidwording';
        $response = $service->get($url);
        //dd($response);
        return view('information.invalidwording',compact('response'));
    }
    public function blacklist(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/blacklist';
        $response = $service->get($url);
        //dd($response);
        return view('information.blacklist',compact('response'));
    }
    public function drlist(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/deliveryreport';
        $response = $service->get($url);
        //dd($response);
        return view('information.drlist',compact('response'));
    }
    public function masking(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/masking';
        $response = $service->get($url);
        //dd($response);
        return view('information.masking',compact('response'));
    }
    public function prefix(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/prefix';
        $response = $service->get($url);
        //dd($response);
        return view('information.prefix',compact('response'));
    }
    public function privilege(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/privilege';
        $response = $service->get($url);
        //dd($response);
        return view('information.privilege',compact('response'));
    }
    public function tokenbalance(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/tokenbalance';
        $response = $service->get($url);
        //dd($response);
        return view('information.tokenbalance',compact('response'));
    }
    public function tokenmap(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/tokenmap';
        $response = $service->get($url);
        //dd($response);
        return view('information.tokenmap',compact('response'));
    }
    public function watemplate(){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/watemplate';
        $response = $service->get($url);
        //dd($response);
        return view('information.watemplate',compact('response'));
    }
}
