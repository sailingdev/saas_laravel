<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WatermarkController extends Controller
{
    public function index(){
        return view('backend.watermark');
    }
}
