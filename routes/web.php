<?php

use App\Http\Controllers\backend\AdminController;
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


//Route::get('/{vue_capture?}', function () {
//    return view('welcome');
//})->where('vue_capture', '[\/\w\.-]*');


Route::get('/', function () {
    return view('welcome');
});


//Admin Page
Route::group(['prefix'=>'admin'],function(){
    Route::get('/login',[AdminController::class,'login']);
    Route::get('/',[AdminController::class,'index']);
});


//Authentication
Route::post('api/v1/login',[\App\Http\Controllers\backend\AuthController::class,'login']);


Route::resource('api/v1/admin',AdminController::class);

Route::resource('banner',\App\Http\Controllers\backend\BannerController::class);
