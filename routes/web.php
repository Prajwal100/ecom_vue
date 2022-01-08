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


Route::get('/', [\App\Http\Controllers\HomeController::class,'home']);


//Admin Page
Route::group(['prefix'=>'admin'],function(){
    Route::get('/login',[AdminController::class,'login'])->name('admin.login');
});

Route::group(['prefix'=>'dashboard'],function(){
    Route::get('/',[AdminController::class,'index'])->name('admin')->middleware('admin');


    Route::resource('banner',\App\Http\Controllers\backend\BannerController::class);
    Route::resource('category',\App\Http\Controllers\backend\CategoryController::class);

});


//Authentication
Route::post('login',[\App\Http\Controllers\backend\AuthController::class,'login']);
Route::get('logout',[\App\Http\Controllers\backend\AuthController::class,'logout']);

Route::resource('api/v1/admin',AdminController::class);
