<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramPostController extends Controller
{
    public function index(){

        $post_types = [
            [
                "id" => "media",
                "name" => __("Media"),
                "icon" => "fas fa-photo-video"
            ],
            [
                "id" => "story",
                "name" => __("Story"),
                "icon" => "far fa-image"
            ],
            [
                "id" => "igtv",
                "name" => __("IGTV"),
                "icon" => "fas fa-tv"
            ],
            [
                "id" => "carousel",
                "name" => __("Carousel"),
                "icon" => "fas fa-layer-group"
            ]
        ];



        return view('backend.instagram_post.instagrampost', ['post_type' => $post_types]);
    }
}
