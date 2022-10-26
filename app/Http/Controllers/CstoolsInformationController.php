<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CstoolsInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /// dd($response);
        return view('cstools-information.index');
    }

    public function list(Request $request)
    {
        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/information';
        $data = $service->get($url,$request);
        
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' . route('cstools-informations.edit', ['cstools_information' => $row['id']]) . '" data-href="' . route('cstools-information.update', ['id' => $row['id']]) . '" data-id="' . $row['id'] . '" class="edit btn btn-success text-white btn-sm infoEdit">Edit</a> <a href="' . route('cstools-informations.delete', ['id' => $row['id']]) . '" data-id="' . $row['id'] . '" class="delete btn btn-danger btn-sm text-white infoDelete">Delete</a>';
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
        $request->validate([
            'name' => 'required',
            'information' => 'required',
            
        ]);
        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/information';
        $response = $service->post($url, $request);

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


        $userUrl = env('API_URL') . '/api/information/' . $id;
        $data = $service->get($userUrl);
        return $data;
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
            'name' => 'required',
            'information'=>'required'
            
        ]);

        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/information/' . $id;
        $response = $service->put($url, $request);

        return $response;
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
        $url = env('API_URL') . '/api/information/' . $id;
        $response = $service->delete($url);

        return $response;
    }
}
