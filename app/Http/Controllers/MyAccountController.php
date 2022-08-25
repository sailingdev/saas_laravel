<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function index(){
        return view('backend.my_account.my_account');
    }
}
