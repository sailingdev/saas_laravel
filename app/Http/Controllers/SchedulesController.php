<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    public function index(){
        return view('backend.schedules.schedules');
    }
}
