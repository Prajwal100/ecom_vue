<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function index(){
        return view('backend.index');
    }
}
