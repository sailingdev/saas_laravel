<?php

namespace App\Http\Controllers;

use App\AccountManager;
use App\Helper\Helper;

class WatermarkController extends Controller
{
    public function index($ids = ""){

        $result = [
            "ids" => "",
            "watermark_size" => Helper::_gt("watermark_size", 30),
            "watermark_opacity" => Helper::_gt("watermark_opacity", 70),
            "watermark_position" => Helper::_gt("watermark_position", "lb"),
            "watermark_mask" => Helper::_gt("watermark_mask", "")
        ];

        if($ids != ""){

            $account = AccountManager::where('ids', $ids)->first();

            if(empty($account)) redirect('/home');

            $watermark_size = Helper::_gm("watermark_size", "", $account->id)?_gm("watermark_size", "", $account->id):Helper::_gt("watermark_size", 30);
            $watermark_opacity = Helper::_gm("watermark_opacity", "", $account->id)?_gm("watermark_opacity", "", $account->id):Helper::_gt("watermark_opacity", 70);
            $watermark_position = Helper::_gm("watermark_position", "", $account->id)?_gm("watermark_position", "", $account->id):Helper::_gt("watermark_position", "lb");
            $watermark_mask = Helper::_gm("watermark_mask", "", $account->id)?_gm("watermark_mask", "", $account->id):Helper::_gt("watermark_mask", "");

            $result = [
                "ids" => $account->ids,
                "watermark_size" => $watermark_size,
                "watermark_opacity" => $watermark_opacity,
                "watermark_position" => $watermark_position,
                "watermark_mask" => $watermark_mask
            ];
        }

        //
        $team_id = Helper::_t("id");
        $data = [ "result" => (object)$result ];

        //$page = page($this, "pages", "general", "general", $data, '');
        //





        return view('backend.watermark.watermark', ["result" => (object)$result]);
    }
}
