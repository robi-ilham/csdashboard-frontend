<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function allUserApp(){
        return view('user.all-user'); 

    }
    public function index()
    {
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/user';
        $response = $service->get($url);
       /// dd($response);
        return view('user.index',['data'=>$response]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user._form_new');
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
            'username'=>'name',
            'email'=>'required',
            'password'=>'required|confirmed'
        ]);
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/user';
        $response = $service->post($url,$request);
        
        return $response;
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
        

        $userUrl= env('API_URL').'/api/user/'.$id;
        $user=$service->get($userUrl);

       // print_r($user);exit;
        return view('user._form_edit',compact('user','id'));
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
        $url=env('API_URL').'/api/user/'.$id;
        $response = $service->put($url,$request);

       // print_r($response);

        return redirect(route('users.index'));
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
        $url=env('API_URL').'/api/user/'.$id;
        $response = $service->delete($url);

        return redirect(route('users.index'));
    }
}
