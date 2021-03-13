<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog_posts($post)
    {
        $posts =
        [
            "my-first-post" => "Hello, This is my first blog post using laravel",
            "my-second-post" => "Hello, This is my second blog post using laravel",
        ];

        if (!array_key_exists($post,$posts)) {
            abort(404,"Ohh Sorry! This post not avaialble");
        }

        return view('blog',["blog"=>$posts[$post]]);
    }
}
