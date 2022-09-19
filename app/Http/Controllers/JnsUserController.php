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
    public function index(Request $request)
    {

        
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/user';
        $data = $service->get($url,$request);

        $urlDiv=env('API_URL').'/api/jns/division';
        $divisions = $service->get($urlDiv);

        $urlGroup=env('API_URL').'/api/jns/group';
        $groups = $service->get($urlGroup);

        $urlClient=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($urlClient);

       


        return view('jns.user.index',compact('data','divisions','groups','clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = new ServiceRequest();
        

        $urlDiv=env('API_URL').'/api/jns/division';
        $divisions = $service->get($urlDiv);

        $urlGroup=env('API_URL').'/api/jns/group';
        $groups = $service->get($urlGroup);

        $urlClient=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($urlClient);

        return view('jns.user._form_new',compact('divisions','groups','clients'));
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
        return back()->withInput();
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

        $urlDiv=env('API_URL').'/api/jns/division';
        $divisions = $service->get($urlDiv);

        $urlGroup=env('API_URL').'/api/jns/group';
        $groups = $service->get($urlGroup);

        $urlClient=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($urlClient);
        return view('jns.user._form_edit',compact('clients','user','id','divisions','groups','clients'));
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

       return back()->withInput();

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

        return back()->withInput();

        return redirect(route('jns.divisions.index'));
    }
}
