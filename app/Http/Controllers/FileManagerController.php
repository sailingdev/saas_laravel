<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    public function index(){
        return view('backend.file_manager.filemanager');
    }
}
