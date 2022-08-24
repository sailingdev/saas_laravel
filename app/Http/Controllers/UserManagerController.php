<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function index(){
        return view('backend.user_manager.usermanager');
    }

    public function report(){
        return view('backend.user_manager.report');
    }
}
