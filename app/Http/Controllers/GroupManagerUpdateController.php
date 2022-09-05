<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupManagerUpdateController extends Controller
{
    public function index(){
        return view('backend.group_manager.groupmanagerupdate');
    }
}
