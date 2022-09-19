<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;

class JnsM2mSmppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = new ServiceRequest();
        $clientsUrl=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($clientsUrl);

        $divisionUrl=env('API_URL').'/api/jns/divisions/all';
        $divisions=$service->get($divisionUrl);

        $url=env('API_URL').'/api/smpp/user';
        $response = $service->get($url);

        return view('smpp.index',compact('response','clients','divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = new ServiceRequest();
        $clientsUrl=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($clientsUrl);

        $divisionUrl=env('API_URL').'/api/jns/divisions/all';
        $divisions=$service->get($divisionUrl);
        
        return view('smpp._form',compact('clients','divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
       
        $request->validate([
            'dr_format'=>'required|integer'
        ]);
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/smpp/user';
        $response = $service->post($url,$request);
        return back()->withInput();

        return redirect(route('smpps.users.index'));
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
        $service = new ServiceRequest();
        $clientsUrl=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($clientsUrl);

        $divisionUrl=env('API_URL').'/api/jns/divisions/all';
        $divisions=$service->get($divisionUrl);

        $userUrl= env('API_URL').'/api/smpp/user/'.$id;
        $user=$service->get($userUrl);
        //print_r($user);
        return view('smpp._edit_form',compact('clients','divisions','user','id'));
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
        

        $service = new ServiceRequest();
        $url=env('API_URL').'/api/smpp/user/'.$id;
        $response = $service->put($url,$request);

        return back()->withInput();
       // return $response;
        return redirect(route('smpps.users.index'));
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
        $url=env('API_URL').'/api/smpp/user/'.$id;
        $response = $service->delete($url);
        return back()->withInput();
        return redirect(route('smpps.users.index'));
    }
}
