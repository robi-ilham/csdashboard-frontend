<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller{

    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request){

       // return view('home');
        $request->validate([
            'email'=>'required|email',
            'password'=>[
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);
        $url=env('API_URL').'/api/login';
      $response=Http::accept('application/json')->post($url,[
        'email'=>$request->email,
        'password'=>$request->password
      ]);

        if($response->successful()){
            session([
                'token' => $response['token'],
                'name' => $response['user']['name'],
                'email' => $response['user']['email']
                
            ]);
            return redirect(route('home'));
        }
        return redirect(route('auth.index'));
    }

    public function logout()
    {
     

        // Delete all sessions and redirect to login page
        session()->flush();
        return redirect(route('auth.index'));
    }
}