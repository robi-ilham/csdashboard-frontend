<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ServiceRequest;
use Yajra\DataTables\Facades\DataTables;

class CproSenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/division/index-api';
        $divisions = $service->get($url);
        // $divisions = json_encode($divisions["query-result"]["data"]);

        // return $divisions;
        return view('cpro.sender.index',compact('divisions'));
    }
    public function list(Request $request)
    {
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/cpro/sender';
        $response = $service->get($url,$request);

      // return $response;
       return DataTables::of($response['Data'])
                ->addIndexColumn()
                ->make(true);

      //  return view('cpro.sender.index',compact('response'));
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
