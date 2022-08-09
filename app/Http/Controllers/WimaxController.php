<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Fag;
use Illuminate\Http\Request;

class WimaxController extends Controller
{
    public function __construct(){}

    public function index(){
        $faqs = Fag::where("status", 1)->get();
        return view("index", ["faqs" => $faqs]);
    }
    public function pricing(){
        $data = array();
        return view('pricing', ['data'=>$data]);
    }
    public function blog(Request $request){
        $blogs = Blog::paginate(6);
        return view ('blog', ['blogs' => $blogs]);
    }
}
