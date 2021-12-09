<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:6',
        ]);
        $email = $request->email;
        $password = $request->password;
        if(Auth::guard('admin')->attempt(['email'=>$email,'password'=>$password,'status'=>'active'])){
            return ['status'=>'success','message'=>['Login Successfully']];
        }
        else{
            return ['status'=>'error','message'=>['Invalid Email or Password']];
        }
    }

}
