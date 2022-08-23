<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublishAllController extends Controller
{
    public function index(){
        return view('backend.publishall');
    }
}
