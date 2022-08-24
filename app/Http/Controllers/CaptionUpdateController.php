<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptionUpdateController extends Controller
{
    public function index(){
        return view('backend.caption.captionupdate');
    }
}
