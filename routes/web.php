<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JnsClientController;
use App\Http\Controllers\JnsDivisionController;
use App\Http\Controllers\JnsM2mHttpController;
use App\Http\Controllers\JnsM2mSmppController;
use App\Http\Controllers\JnsUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Auth::routes();

//Route::middleware('authentication')->get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('auth.')->prefix('auth')->group(function(){
    Route::get('', [AuthController::class, 'index'])->name('index');
    Route::post('', [AuthController::class, 'authenticate'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

Route::middleware('authentication')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::name('jns.')->prefix('jns')->group(function(){
        
            Route::resource('users', JnsUserController::class);
            Route::resource('https', JnsM2mHttpController::class);
            Route::resource('smpps', JnsM2mSmppController::class);
            Route::post('/users/update/{id}',[JnsUserController::class,'update'])->name('user.update');
            Route::post('/users/delete/{user}',[JnsUserController::class,'destroy'])->name('user.delete');

            Route::resource('divisions', JnsDivisionController::class);
            Route::post('/divisions/update/{id}',[JnsDivisionController::class,'update'])->name('division.update');
            Route::post('/divisions/delete/{division}',[JnsDivisionController::class,'destroy'])->name('division.delete');

            Route::resource('clients', JnsClientController::class);
            Route::post('/clients/update/{id}',[JnsClientController::class,'update'])->name('client.update');
            Route::post('/clients/delete/{client}',[JnsClientController::class,'destroy'])->name('client.delete');
            
    });

});