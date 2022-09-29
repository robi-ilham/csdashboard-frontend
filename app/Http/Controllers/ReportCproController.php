<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;

class ReportCproController extends Controller
{

    public function broadcastListIndex(){
        return view('report.cpro.broadcastList');
    }
    public function broadcastList(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/report/cpro/broadcast-list';
        $response = $service->get($url,$request);

        return $response;

       // return view('cpro.sender.index',compact('response'));
    }


    public function helpdeskListIndex(){
        return view('report.cpro.helpdeskList');
    }
    public function helpdeskList(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/report/cpro/helpdesk-list';
        $response = $service->get($url,$request);

        return $response;

        return view('cpro.sender.index',compact('response'));
    }
   
    public function chatbotListIndex(){
        return view('report.cpro.chatbotList');
    }
    public function chatbotList(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/report/cpro/chatbot-list';
        $response = $service->get($url,$request);

        return $response;

        return view('cpro.sender.index',compact('response'));
    }
   
    
}
