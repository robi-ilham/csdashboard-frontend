<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;

class JnsUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/user';
        $response = $service->get($url);

        return view('jns.user.index',['data'=>$response]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jns.user._form_new');
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
                'username'=>'required|string',
                'password'=>'required|confirmed|min:8',
                'name'=>'required',
        ]);

        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/user';
        $response = $service->post($url,$request);
        return redirect(route('jns.users.index'));

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
        $url=env('API_URL').'/api/jns/client';
        $clients = $service->get($url);

        $user = env('API_URL').'/api/jns/user/'.$id;
        $user = $service->get($user);
        return view('jns.user._form_edit',compact('clients','user','id'));
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
            'name'=>'required',
            'username'=>'required',
        ]);

        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/user/'.$id;
        $response = $service->put($url,$request);
        return redirect(route('jns.users.index'));
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
        $url=env('API_URL').'/api/jns/user/'.$id;
        $response = $service->delete($url);

        return redirect(route('jns.divisions.index'));
    }
}
