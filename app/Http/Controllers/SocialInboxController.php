<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialInboxController extends Controller
{
    public function index(){
        return view('backend.social_inbox.social_inbox');
    }
}
