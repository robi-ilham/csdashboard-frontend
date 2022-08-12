<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\JnsClientController;
use App\Http\Controllers\JnsDivisionController;
use App\Http\Controllers\JnsM2mHttpController;
use App\Http\Controllers\JnsM2mSmppController;
use App\Http\Controllers\JnsUserController;
use App\Http\Controllers\UserController;
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
    Route::resource('users', UserController::class);

    Route::name('jns.')->prefix('jns')->group(function(){
        
            Route::resource('users', JnsUserController::class);
            Route::post('/users/update/{id}',[JnsUserController::class,'update'])->name('user.update');
            Route::post('/users/delete/{user}',[JnsUserController::class,'destroy'])->name('user.delete');

            Route::resource('divisions', JnsDivisionController::class);
            Route::post('/divisions/update/{id}',[JnsDivisionController::class,'update'])->name('division.update');
            Route::post('/divisions/delete/{division}',[JnsDivisionController::class,'destroy'])->name('division.delete');

            Route::resource('clients', JnsClientController::class);
            Route::post('/clients/update/{id}',[JnsClientController::class,'update'])->name('client.update');
            Route::post('/clients/delete/{client}',[JnsClientController::class,'destroy'])->name('client.delete');

                        
    });
    Route::name('m2m.')->prefix('m2m')->group(function(){
        Route::resource('users', JnsM2mHttpController::class);
        Route::post('/users/delete/{user}',[JnsM2mHttpController::class,'destroy'])->name('users.delete');
    });
    Route::name('smpps.')->prefix('smpps')->group(function(){
        Route::resource('users', JnsM2mSmppController::class);
        Route::post('/users/delete/{user}',[JnsM2mHttpController::class,'destroy'])->name('users.delete');
    });

    Route::name('information.')->prefix('information')->group(function(){
        Route::get('audittrail',[InformationsController::class,'audittrail'])->name('audittrail');
        Route::get('invalidwording',[InformationsController::class,'invalidwording'])->name('invalidwording');
        Route::get('blacklist',[InformationsController::class,'blacklist'])->name('blacklist');
        Route::get('drlist',[InformationsController::class,'drlist'])->name('drlist');
        Route::get('masking',[InformationsController::class,'masking'])->name('masking');
        Route::get('prefix',[InformationsController::class,'prefix'])->name('prefix');
        Route::get('privilege',[InformationsController::class,'privilege'])->name('privilege');
        Route::get('tokenbalance',[InformationsController::class,'tokenbalance'])->name('tokenbalance');
        Route::get('tokenmap',[InformationsController::class,'tokenmap'])->name('tokenmap');
        Route::get('watemplate',[InformationsController::class,'watemplate'])->name('watemplate');
    });

});