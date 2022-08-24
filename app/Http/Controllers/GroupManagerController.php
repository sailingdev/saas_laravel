<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupManagerController extends Controller
{
    public function index(){
        return view('backend.group_manager.groupmanager');
    }
}
