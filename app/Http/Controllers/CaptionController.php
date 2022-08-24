<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptionController extends Controller
{
    public function index(){
        return view('backend.caption.caption');
    }
}
