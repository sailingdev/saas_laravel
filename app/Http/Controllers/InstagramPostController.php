<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramPostController extends Controller
{
    public function index(){
        return view('backend.instagrampost');
    }
}
