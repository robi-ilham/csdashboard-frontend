<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ServiceRequest;

class CproDivisionController extends Controller
{
    public function index(Request $request)
    {
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/division';
        $response = $service->get($url);
       // return $response;

        return view('cpro.division.index',['data'=>$response]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/client';
        $clients = $service->get($url);
        return view('cpro.division._form',compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/division';
        $response = $service->post($url,$request);

        return redirect(route('cpro.divisions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/client';
        $clients = $service->get($url);

        $divUrl = env('API_URL').'/api/cpro/division/'.$id;
        $div = $service->get($divUrl);
        return view('cpro.division._edit_form',compact('clients','div','id'));
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
        $request->validate([
            'name'=>'required'
        ]);

        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/division/'.$id;
        $response = $service->put($url,$request);

        return redirect(route('cpro.divisions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/division/'.$id;
        $response = $service->delete($url);

        return redirect(route('cpro.divisions.index'));
    }
}
