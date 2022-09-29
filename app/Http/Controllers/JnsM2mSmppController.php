<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
    public function list(Request $request)
    {
        //return $request;
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/smpp/user/index-ajax';
        $data = $service->get($url,$request);
       // return $data;
        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('smpps.users.edit',['user'=>$row['client_id']]).'" data-href="'.route('smpps.user.update',['id'=>$row['client_id']]).'" data-id="'.$row['client_id'].'" class="edit btn btn-success text-white btn-sm smppUserEdit">Edit</a> <a href="'.route('smpps.users.delete',['user'=>$row['client_id']]).'" data-id="'.$row['client_id'].'" class="delete btn btn-danger btn-sm text-white smppUserDelete">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);


       
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
    public function store(Request $request)
    {
       
        $request->validate([
            'client_id'=>'required|integer',
            'system_id'=>'required'
        ]);
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/smpp/user';
        $response = $service->post($url,$request);
        return $response;
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
        return $user;
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
        return $response;
        return redirect(route('smpps.users.index'));
    }
}
