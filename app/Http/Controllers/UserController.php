<?php

namespace App\Http\Controllers;

use App\Service\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function allUserApp()
    {
        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/user';
        $data = $service->get($url);

        $urlDiv = env('API_URL') . '/api/jns/divisions/all';
        $divisions = $service->get($urlDiv);

        $urlGroup = env('API_URL') . '/api/jns/group';
        $groups = $service->get($urlGroup);

        $urlClient = env('API_URL') . '/api/jns/clients/all';
        $clients = $service->get($urlClient);

        $sendersUrl = env('API_URL') . '/api/wai/sender';
        $senders = $service->get($sendersUrl);

        $cproSendersUrl = env('API_URL') . '/api/cpro/sender';
        $cproSenders = $service->get($cproSendersUrl);

        $urlPrivilege = env('API_URL') . '/api/jns/privilegetype';
        $privileges = $service->get($urlPrivilege);

        // return $cproSenders['Data'];
        return view('user.all-user', compact('data', 'divisions', 'groups', 'clients', 'senders', 'cproSenders', 'privileges'));
    }
    public function index()
    {

        /// dd($response);
        return view('user._cstoolsuser');
    }

    public function list(Request $request)
    {
        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/user';
        $data = $service->get($url,$request);
        
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' . route('users.resetform', ['id' => $row['id']]) . '" data-href="' . route('users.resetpassword') . '" data-id="' . $row['id'] . '" class="reset-password btn btn-warning text-white btn-sm ">Reset Password</a> <a href="' . route('users.edit', ['user' => $row['id']]) . '" data-href="' . route('user.update', ['id' => $row['id']]) . '" data-id="' . $row['id'] . '" class="edit btn btn-success text-white btn-sm userEdit">Edit</a> <a href="' . route('users.delete', ['user' => $row['id']]) . '" data-id="' . $row['id'] . '" class="delete btn btn-danger btn-sm text-white userDelete">Delete</a>';
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
        return view('user._form_new');
    }

    public function resetForm($id)
    {
        return view('user._reset_password_cstools', compact('id'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);
        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/user/reset-password';
        $response = $service->post($url, $request);
        if($response->status()!=200){
            $error = ValidationException::withMessages(['message'=>'user not found']);
            throw $error;
        }
        return $response;
        // return view('user._reset_password',compact('id'));
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
            'email' => 'required',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);
        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/user';
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


        $userUrl = env('API_URL') . '/api/user/' . $id;
        $user = $service->get($userUrl);
        return $user;
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
            'status' => 'required',
            
        ]);

        $service = new ServiceRequest();
        $url = env('API_URL') . '/api/user/' . $id;
        $response = $service->put($url, $request);

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
        $url = env('API_URL') . '/api/user/' . $id;
        $response = $service->delete($url);

        return redirect(route('users.index'));
    }
}
