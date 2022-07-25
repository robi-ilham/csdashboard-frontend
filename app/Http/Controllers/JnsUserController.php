<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JnsUserController extends Controller
{
    
    public function index(){
        return view('jns.user.index');
    }
    public function create(){
        return view('jns.user.create');
    }

}
