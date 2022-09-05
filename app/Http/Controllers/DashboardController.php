<?php

namespace App\Http\Controllers;

use App\AccountManager;
use App\Helper\Helper;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($ids = ""){
        $team_id = Helper::_t('id');
        $accounts = AccountManager::where('ids', $ids)
            ->where('team_id', $team_id)
            ->where('status', 1)->get();
        return view('backend.dashboard.dashboard');
    }
}
