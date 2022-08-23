<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacebookPostController extends Controller
{
    public function index(){
        return view('backend.facebookpost');
    }
}
