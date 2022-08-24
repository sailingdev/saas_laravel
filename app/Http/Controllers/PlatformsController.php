<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlatformsController extends Controller
{
    public function index(){
        return view('backend.platforms.platforms');
    }
}
