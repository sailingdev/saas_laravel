<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create-post');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',   // required and email format validation
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
                'g-recaptcha-response' => 'required|captcha'

            ]
        ); // create the validations

        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return back()->withInput()->withErrors($validator);
        } else {
            return response()->json(["status" => true, "message" => "Form submitted successfully"]);
        }
    }
    public function refreshCaptcha()
    {
        return response()->json(['captcha' => recaptcha()]);
    }
}
