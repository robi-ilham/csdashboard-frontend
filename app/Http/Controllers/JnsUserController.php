<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

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

       
       //    return $clients;
     //  return $data;

        return view('jns.user.index',compact('data','divisions','groups','clients'));
    }

    public function list(Request $request)
    {
        
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/user/index-ajax';
        $data = $service->get($url,$request);

        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('jns.users.edit',['user'=>$row['id']]).'" data-href="'.route('jns.user.update',['id'=>$row['id']]).'" data-id="'.$row['id'].'" class="edit btn btn-success text-white btn-sm jnsUserEdit">Edit</a> <a href="'.route('jns.users.reset-password').'" data-id="'.$row['id'].'" class="delete btn btn-warning btn-sm text-white reset-password">Reset Password</a> <a href="'.route('jns.user.delete',['user'=>$row['id']]).'" data-id="'.$row['id'].'" class="delete btn btn-danger btn-sm text-white jnsUserDelete">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);


       
        return $data;
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
        return $user;
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

    public function resetPassword(Request $request){
  
        $validator = Validator::make($request->all(),[
            'old_password' => 'required|min:8',
            'password' => 'required|confirmed|min:8',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),500);
        }
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/jns/user/reset-password';
        
        $response = $service->post($url,$request);

       return $response;
    }
}
