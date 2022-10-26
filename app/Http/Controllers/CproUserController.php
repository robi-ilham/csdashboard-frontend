<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ServiceRequest;
use Yajra\DataTables\Facades\DataTables;

class CproUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = ($request->start/10)+1;
        $params=[
            'page'=>$page,
            'username'=>$request->username,
            'client_id'=>$request->client_id,
            'division_id'=>$request->division_id,
            'sender'=>$request->sender_id,
            'privilege_id'=>$request->privilege_id
        ];
        //return $params;
        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/cpro/user';
        $response = $service->get($url,$params);
       // return $response;

        $return = [
            'draw' => $request->draw,
            'recordstotal' => $response['query-result']['row-count'],
            'recordsFiltered' => $response['query-result']['row-count'],
            'data' => $response['query-result']['data']
            
        ];

     
        return $return;
     
    }
    public function list(Request $request)
    {
        //return $request;
        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/cpro/user';
        $data = $service->get($url, $request);
        return $data;
        // return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             $actionBtn = '<a href="'.route('m2m.users.edit',['user'=>$row['id']]).'" data-href="'.route('m2m.user.update',['id'=>$row['id']]).'" data-id="'.$row['id'].'" class="edit btn btn-success text-white btn-sm m2mUserEdit">Edit</a> <a href="'.route('m2m.users.delete',['user'=>$row['id']]).'" data-id="'.$row['id'].'" class="delete btn btn-danger btn-sm text-white m2mUserDelete">Delete</a>';
        //             return $actionBtn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);



    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request;
        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/cpro/user';
        $response = $service->post($url, $request);

          return $response;

        //return view('cpro.user.index', compact('response'));
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
        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/cpro/user/' . $id;
        $response = $service->delete($url);
        return $response;
    }
}
