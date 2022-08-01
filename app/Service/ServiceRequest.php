<?php
namespace App\Service;

use Illuminate\Support\Facades\Http;

class ServiceRequest {

    public function get($url){
        $token = session('token');
        $response = Http::accept('application/json')->withToken($token)->get($url)->throw()->json();
        return $response;
    }

    public function post($url,$params=null){
        $token = session('token');

        $response = Http::accept('application/json')->withToken($token)->post($url,$params)->throw()->json();
        return $response;
    }

    public function put($url,$params=null){
        $token = session('token');

        $response = Http::accept('application/json')->withToken($token)->put($url,$params)->throw()->json();
        return $response;
    }

    public function delete($url){
        $token = session('token');

        $response = Http::accept('application/json')->withToken($token)->delete($url)->throw()->json();
        return $response;
    }

}