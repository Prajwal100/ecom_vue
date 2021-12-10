<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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
            session(['LOG'=> 'IN']);
            session(['ID' => Admin::where('email',$email)->first()->id]);
            return ['status'=>'success','message'=>['Login Successfully']];
        }
        else{
            return ['status'=>'error','message'=>['Invalid Email or Password']];
        }
    }

    public function logout(Request $request){
        session(['LOG'=>'OUT']);
        $admin=$this->guard()->user();
        if(!empty($admin)){
            $this->guard()->logout();
        }
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

}
