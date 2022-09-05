<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyAccountController extends Controller
{

    public function profile(){
        return view('backend.my_account.profile');
    }

    public function pricing_bill(){
        return view('backend.my_account.pricing_bill');
    }

    public function redeem_code(){
        return view('backend.my_account.redeem_code');
    }

    public function invoice_history(){
        return view('backend.my_account.invoice_history');
    }
}
