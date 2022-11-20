<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class JnsM2mHttpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/m2m/user';
        $response = $service->get($url);

        $clientsUrl=env('API_URL').'/api/jns/clients/all';
        $clients = $service->get($clientsUrl);

        return view('m2m.index',compact('response','clients'));
    }
    public function list(Request $request)
    {
        //return $request;
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/m2m/user/index-ajax';
        $data = $service->get($url,$request);
        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('m2m.users.edit',['user'=>$row['id']]).'" data-href="'.route('m2m.user.update',['id'=>$row['id']]).'" data-id="'.$row['id'].'" class="view-data btn btn-warning text-white btn-sm ">View</a> <a href="'.route('m2m.users.edit',['user'=>$row['id']]).'" data-href="'.route('m2m.user.update',['id'=>$row['id']]).'" data-id="'.$row['id'].'" class="edit btn btn-success text-white btn-sm m2mUserEdit">Edit</a> <a href="'.route('m2m.users.delete',['user'=>$row['id']]).'" data-id="'.$row['id'].'" class="delete btn btn-danger btn-sm text-white m2mUserDelete">Delete</a>';
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

        return view('m2m._form',compact('clients','divisions'));
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
            'password'=>'required|string',
           // 'client_name'=>'required',
            'client_id'=>'required',
            'division_id'=>'required',
          //  'access_mod'=>'required',
            'api_key'=>'required',
            'expiry'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }

        $service = new ServiceRequest();
        $url=env('API_URL').'/api/m2m/user';
        $response = $service->post($url,$request);
        return back()->withInput();
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

        $userUrl= env('API_URL').'/api/m2m/user/'.$id;
        $user=$service->get($userUrl);
        $accessMod=0;
        if($user){
            $mod= $user['access_mod'];
            if($mod!=0){
                $accessMod=$this->calculateMod($mod);
            }
        }
        return $user;
        return view('m2m._edit_form',compact('clients','divisions','user','id','accessMod'));
    }
    
    private function calculateMod($accessMod){
        switch($accessMod){
            case 1:
                return [1];
                break;
            case 2 :
                return [2];
                break;
            case 4 :
                return [4];
                break;
            case 8:
                return [8];
                break;
            case 3:
                return [1,2];
                break;
            case 5:
                return [1,4];
                break;
            case 9:
                return [1,9];
                break;
            case 6:
                return [2,4];
                break;
            case 10:
                return [2,8];
                break;
            case 12:
                return [4,8];
                break;
            case 7 : 
                return [1,2,4];
                break;
            case 11:
                return [1,2,8];
                break;
            case 13:
                return [1,4,8];
                break;
            case 14:
                return [2,4,8];
                break;
            case 15:
                return [1,2,4,8];
                break;
        }
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
       // return response()->json($request);
        $service = new ServiceRequest();
        $url=env('API_URL').'/api/m2m/user/'.$id;
        $response = $service->put($url,$request);
        return $response;
      //  return back()->withInput();
        return redirect(route('m2m.users.index'));
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
        $url=env('API_URL').'/api/m2m/user/'.$id;
        $response = $service->delete($url);
        return back()->withInput();
        return redirect(route('m2m.users.index'));
    }
    
}
