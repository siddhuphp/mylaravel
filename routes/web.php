<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Example of sending simple string to URL
// Route::get('your_url/{wildcard}','function()')
Route::get('/string_example', function () {
    return "Siddhu first laravel application";
});

// Example of sending array data to URL
Route::get('/array_example', function () {
    return ["Laravel","PHP","MySQL"];
});

// Example of sending array data to URL
Route::get('/json_example', function () {
    return ["framework"=>"Laravel","server"=>"PHP","db"=>"MySQL"];
});

// case-senstive test => failed if we call with "case_senstive"
Route::get('/case_SENSTIVE', function () {
    return "Case setive test of URL";
});

//Passing data to views file (GET request) ex: example.com?name=siddhu
Route::get('/test', function(){
    $name = request('name');
    return view('test',["name"=>$name]);
});

/**
 * Passing data to URL  (GET request) wildcard example
 * ex: example.com/test/1
 * ex: example.com/test/my-first-post
 * ex: example.com/test/abcd   
 * this part  {post} called wildcard
 * wildcard must be pass on function
 */
Route::get('/test/{post}', function($post){
       return view('test',["name"=>$post]);
});

/**
 *  Let's take a small example of blog posts 
 *  Just assume some static data getting from DB ($posts)
 *  in this case you call url blog/my-first-post
 *  if posts are not available the redirect to 404
 *  abort() laravel function
 * */
Route::get('blog/{post}',function($post){
    $posts =
    [
        "my-first-post" => "Hello, This is my first blog post using laravel",
        "my-second-post" => "Hello, This is my second blog post using laravel",
    ];

    if (!array_key_exists($post,$posts)) {
        abort(404,"Ohh Sorry! This post not avaialble");
    }

    return view('blog',["blog"=>$posts[$post]]);
});

/**
 * Now will take example to load blog from controller
 * Route::get('your_url/{wildcard}','App\Http\Controllers\your_controller_name@your_method')
 * Controller folder located at App/http/controllers
 * To make a controller run a simple command "PHP artisan make:controller your_controller_name"
 * here calling URL will be /blog_from_controller/my-first-post
 */
Route::get('blog_from_controller/{post}','App\Http\Controllers\BlogController@blog_posts');


/**
 * Example of bring blog data from db
 */
Route::get('blog_from_db_example/{post}','App\Http\Controllers\BlogController@blog_db_example');

/**
 * Example of bring blog data from db
 */
Route::get('blog_from_model_db_example/{post}','App\Http\Controllers\BlogController@blog_db_model_example');


/**
 * Example of html template
 */
Route::get('html_template','App\Http\Controllers\viewController@example');


