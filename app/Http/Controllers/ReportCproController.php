<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;

class ReportCproController extends Controller
{

    public function broadcastListIndex(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/client';
        $clients = $service->get($url);
       // return $clients;

        $url=env('API_URL').'/api/cpro/division/index-api';
        $divisions = $service->get($url);



        $url=env('API_URL').'/api/cpro/template';
        $templates = $service->get($url);

        $url=env('API_URL').'/api/cpro/sender';
        $senders = $service->get($url,$request);


        return view('report.cpro.broadcastList',compact('clients','divisions','templates','senders'));
    }
    public function broadcastList(Request $request){
       

        $page = ($request->start/10)+1;
        $params=[
            'page'=>$page,
            'client_id'=>$request->client_id,
            'division_id'=>$request->division_id,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date
        ];
        //return $params;
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/report/cpro/broadcast-list';
        $response = $service->get($url,$params);
       // return $response;

        $return = [
            'draw' => $request->draw,
            'recordstotal' => $response['query-result']['row-count'],
            'recordsFiltered' => $response['query-result']['row-count'],
            'data' => $response['query-result']['data']
            
        ];
        return $return;
       // return view('cpro.sender.index',compact('response'));
    }

    public function requestNewBroadcast(Request $request){


        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/cpro/broadcast';
        $response = $service->post($url, $request);

        return $response;
    }

    public function requestNewHelpdesk(Request $request){


        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/cpro/helpdesk';
        $response = $service->post($url, $request);

        return $response;
    }

    public function requestNewChatbot(Request $request){


        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/cpro/chatbot';
        $response = $service->post($url, $request);

        return $response;
    }

    public function requestNewButton(Request $request){

        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/cpro/button';
        $response = $service->post($url, $request);

        return $response;
    }


    public function helpdeskListIndex(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/client';
        $clients = $service->get($url);

        $url=env('API_URL').'/api/cpro/division/index-api';
        $divisions = $service->get($url);


        $url=env('API_URL').'/api/cpro/template';
        $templates = $service->get($url);

        $url=env('API_URL').'/api/cpro/sender';
        $senders = $service->get($url,$request);

        $url=env('API_URL').'/api/cpro/template';
        $templates = $service->get($url,$request);

       // return $templates;  

        return view('report.cpro.helpdeskList',compact('clients','divisions','templates','senders','templates'));
    }
    public function helpdeskList(Request $request){
       

        $page = ($request->start/10)+1;
        $params=[
            'page'=>$page,
            'username'=>$request->username,
            'client_id'=>$request->client_id,
            'division_id'=>$request->division_id,
            'sender'=>$request->sender_id,
            'privilege_id'=>$request->privilege_id
        ];
        //return $params;
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/helpdesk';
        $response = $service->get($url,$params);
        //return $response;

        $return = [
            'draw' => $request->draw,
            'recordstotal' => $response['row-count'],
            'recordsFiltered' => $response['row-count'],
            'data' => $response['data']
            
        ];
        return $return;
    }
   
    public function chatbotListIndex(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/client';
        $clients = $service->get($url);

        $url=env('API_URL').'/api/cpro/division/index-api';
        $divisions = $service->get($url);


        $url=env('API_URL').'/api/cpro/template';
        $templates = $service->get($url);

        $url=env('API_URL').'/api/cpro/sender';
        $senders = $service->get($url,$request);

        $url=env('API_URL').'/api/cpro/template';
        $templates = $service->get($url,$request);

        
        return view('report.cpro.chatbotList',compact('clients','divisions','templates','senders','templates'));
    }
    public function chatbotList(Request $request){
        
        $page = ($request->start/10)+1;
        $params=[
            'page'=>$page,
            'username'=>$request->username,
            'client_id'=>$request->client_id,
            'division_id'=>$request->division_id,
            'sender'=>$request->sender_id,
            'privilege_id'=>$request->privilege_id
        ];
        //return $params;

        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/chatbot';
        $response = $service->get($url,$params);

        //return $response;

        $return = [
            'draw' => $request->draw,
            'recordstotal' => $response['query-result']['row-count'],
            'recordsFiltered' => $response['query-result']['row-count'],
            'data' => $response['query-result']['data']
            
        ];
        return $return;
    }


    public function buttonListIndex(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/client';
        $clients = $service->get($url);

        $url=env('API_URL').'/api/cpro/division/index-api';
        $divisions = $service->get($url);


        $url=env('API_URL').'/api/cpro/template';
        $templates = $service->get($url);

        $url=env('API_URL').'/api/cpro/sender';
        $senders = $service->get($url,$request);


        return view('report.cpro.buttonList',compact('clients','divisions','templates','senders','templates'));
    }
    public function buttonList(Request $request){
        
        $page = ($request->start/10)+1;
        $params=[
            'page'=>$page,
            'username'=>$request->username,
            'client_id'=>$request->client_id,
            'division_id'=>$request->division_id,
            'sender'=>$request->sender_id,
            'privilege_id'=>$request->privilege_id
        ];
        //return $params;

        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/button';
        $response = $service->get($url,$params);

        //return $response;

        $return = [
            'draw' => $request->draw,
            'recordstotal' => $response['query-result']['row-count'],
            'recordsFiltered' => $response['query-result']['row-count'],
            'data' => $response['query-result']['data']
            
        ];
        return $return;
    }
    public function template(Request $request){
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/client';
        $clients = $service->get($url);


        $url=env('API_URL').'/api/cpro/sender';
        $senders = $service->get($url,$request);
      

        return view('report.cpro.template',compact('clients','senders'));
    }

    public function templatedata(Request $request){
        $page = ($request->start/10)+1;
        $params=[
            'page'=>$page,
            'client_id'=>$request->client_id,
            'sender'=>$request->sender_id,
        ];
        //return $params;
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/template/list';
        $response = $service->get($url,$params);
        //return $response;

        $return = [
            'draw' => $request->draw,
            'recordstotal' => $response['row-count'],
            'recordsFiltered' => $response['row-count'],
            'data' => $response['data']
            
        ];
        return $return;
    }
    
}
