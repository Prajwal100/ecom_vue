<?php

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

Route::get('/', function () {
    return view('welcome');
});


//Admin Page
Route::group(['prefix'=>'admin'],function(){
    Route::get('/login',[\App\Http\Controllers\AdminController::class,'login']);
    Route::get('/',[\App\Http\Controllers\AdminController::class,'index']);
});


//Authentication
Route::post('api/v1/login',[\App\Http\Controllers\backend\AuthController::class,'login']);


