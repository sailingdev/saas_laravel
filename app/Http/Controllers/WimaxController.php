<?php

namespace App\Http\Controllers;

use App\Fag;
use Illuminate\Http\Request;

class WimaxController extends Controller
{
    public function __construct(){}

    function index(){
        $faqs = Fag::where("status", 1)->get();
        return view("index", ["faqs" => $faqs]);
    }
    function pricing(){}
    function blog(){}
}
