<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function index(){
        return view('backend.usermanager');
    }

    public function report(){
        return view('backend.report');
    }
}
