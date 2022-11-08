<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ServiceRequest;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class WaiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/wai/user';
        $response = $service->get($url);

        $clientsUrl=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($clientsUrl);

        $sendersUrl=env('API_URL').'/api/wai/sender';
        $senders = $service->get($sendersUrl);

       // return $response;

        return view('wai.user.index',['response'=>$response,'clients'=>$clients,'senders'=>$senders]);
    }
    public function list(Request $request)
    {
        //return $request;
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/wai/user/index-ajax';
        $data = $service->get($url,$request);
        return $data;
        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('wai.users.edit',['user'=>$row['id']]).'" data-href="'.route('wai.user.update',['id'=>$row['id']]).'" data-id="'.$row['id'].'" class="view btn btn-warning text-white btn-sm view-data">View</a> <a href="'.route('wai.users.edit',['user'=>$row['id']]).'" data-href="'.route('wai.user.update',['id'=>$row['id']]).'" data-id="'.$row['id'].'" class="edit btn btn-success text-white btn-sm waiUserEdit">Edit</a> <a href="'.route('wai.users.delete',['user'=>$row['id']]).'" data-id="'.$row['id'].'" class="delete btn btn-danger btn-sm text-white waiUserDelete">Delete</a>';
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
        

        $urlDiv=env('API_URL').'/api/jns/division';
        $divisions = $service->get($urlDiv);

        $urlGroup=env('API_URL').'/api/jns/group';
        $groups = $service->get($urlGroup);

        $urlClient=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($urlClient);

        return view('wai.user.new',compact('divisions','groups','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username'=>'required|string',
            'password'=>'required|confirmed',
            'name'=>'required',
            'client_name'=>'required',
            'client_id'=>'required',
            'division_id'=>'required',

        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),500);
        }

    $service = new ServiceRequest();
    $url=env('API_URL').'/api/wai/user';
    $response = $service->post($url,$request);
    if(!$response){
        return $response;
    }

    return back()->withInput();
    return redirect(route('wai.users.index'));
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

        $user = env('API_URL').'/api/wai/user/'.$id;
        $user = $service->get($user);

        $urlDiv=env('API_URL').'/api/jns/division';
        $divisions = $service->get($urlDiv);

        $urlGroup=env('API_URL').'/api/jns/group';
        $groups = $service->get($urlGroup);

        $urlClient=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($urlClient);
        return $user;
        
        return view('wai.user.edit',compact('clients','user','id','divisions','groups','clients'));
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
        $url=env('API_URL').'/api/wai/user/'.$id;
        
        $response = $service->put($url,$request);

        return back()->withInput();

        return redirect(route('wai.users.index'));
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
        $url=env('API_URL').'/api/wai/user/'.$id;
        $response = $service->delete($url);
        return back()->withInput();
        return redirect(route('wai.users.index'));
    }
}
