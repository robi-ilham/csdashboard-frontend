<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JnsDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/jns/division';
        $response = $service->get($url);

        $url = env('API_URL') . '/api/jns/client';
        $clients = $service->get($url);
        //$response=json_encode($response);
        //return $response;
        return view('jns.division.index', ['data' => $response,'clients'=>$clients]);
    }

    public function list(Request $request)
    {
        $page = ($request->start/10)+1;
        $param=[
            'page'=>$page,
            'name'=>$request->name,
            'client_id'=>$request->client_id,
           
            ] ; 
        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/jns/division';
        $response = $service->get($url, $param);
        // return $response;
        $return = [
            "draw" => $request->draw,
            "recordsTotal" => $response["total"],
            "recordsFiltered" => $response['total'],
            "data" => $response["data"],
            "page" => $page
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
        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/jns/client';
        $clients = $service->get($url);
        return view('jns.division._form', compact('clients'));
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
            'name' => 'required'
        ]);

        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/jns/division';
        $response = $service->post($url, $request);
        return $response;
       // return redirect(route('jns.divisions.index'));
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

        $divUrl = env('API_URL') . '/api/jns/division/' . $id;
        $div = $service->get($divUrl);

        return $div;
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
            'name' => 'required'
        ]);

        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/jns/division/' . $id;
        $response = $service->put($url, $request);

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
        $url = env('API_URL') . '/api/jns/division/' . $id;
        $response = $service->delete($url);

        return $response;
    }
}
