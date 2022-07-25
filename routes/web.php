<?php

use App\Http\Controllers\AuthController;
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
        Route::name('user.')->prefix('user')->group(function(){
            Route::get('',[JnsUserController::class,'index'])->name('index');
        });
    });

});