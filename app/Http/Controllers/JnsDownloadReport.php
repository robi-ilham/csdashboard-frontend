<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;

class JnsDownloadReport extends Controller
{
    public function requestReport(Request $request){
        $path=$request->path;
        $params=['path'=>$path];
        
        //return $params;
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/report/request/download';
        $response = $service->post($url,$params);
        $filename=$request->name.".csv";

       // return $response;
        return response($response)
                ->withHeaders([
                    'Content-Type' => 'text/plain',
                    'Cache-Control' => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename="'.$filename.'"',
                ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
