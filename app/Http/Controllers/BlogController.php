<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Tbl_blogs;

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

    /* Below as example of getting data from DB */
    public function blog_db_example($slug)
    {
       
        $post = DB::table('tbl_blogs')->where('slug',$slug)->first();
        
        if(!$post)
        {
            abort(404);
        }

        return view('blog_from_db',["blog"=>$post]);
    }

     /* Below as example of getting data from Model */
     public function blog_db_model_example($slug)
     {
        return view('blog_from_db',[
            "blog" => Tbl_blogs::where('slug',$slug)->firstOrFail()
            ]);
     }
}
