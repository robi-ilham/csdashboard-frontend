<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;

class JnsClientController extends Controller
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
        $response = $service->get($url);

        return view('jns.client.index',['data'=>$response]);
    }
    public function selectList(Request $request)
    {
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/client';
        $response = $service->get($url,$request);

        return $response;
    }
    public function clientList(Request $request)
    {
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/client';
        $response = $service->get($url,$request);

        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('jns.client._form');
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
        $url=env('API_URL').'/api/jns/division';
        $response = $service->post($url,$request);

        return redirect(route('jns.divisions.index'));
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
        $url=env('API_URL').'/api/jns/client';
        $clients = $service->get($url);

        $divUrl = env('API_URL').'/api/jns/division/'.$id;
        $div = $service->get($divUrl);
        return view('jns.division._edit_form',compact('clients','div','id'));
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
        $url=env('API_URL').'/api/jns/division/'.$id;
        $response = $service->put($url,$request);

        return redirect(route('jns.divisions.index'));
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
        $url=env('API_URL').'/api/jns/division/'.$id;
        $response = $service->delete($url);

        return redirect(route('jns.divisions.index'));
    }
}
