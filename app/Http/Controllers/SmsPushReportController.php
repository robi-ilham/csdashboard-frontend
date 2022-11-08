<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;

class SmsPushReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/client';
        $clients = $service->get($url);

        

        $url=env('API_URL').'/api/jns/divisions/all';
        $divisions = $service->get($url);
        //return $divisions;
 

        $url=env('API_URL').'/api/jns/masking/index-ajax';
        $masks = $service->get($url);
        return view('report.request.sms',compact('clients','divisions','masks'));
    }

    public function list(Request $request){
        
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
        $url=env('API_URL').'/api/report/sms-push';
        $response = $service->get($url,$params);
     //   return $response;

        $return = [
            'draw' => $request->draw,
            'recordstotal' => $response['total'],
            'recordsFiltered' => $response['total'],
            'data' => $response['data']
            
        ];
        return $return;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/report/sms-push';
        $response = $service->post($url,$request);
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
