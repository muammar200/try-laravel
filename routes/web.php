<?php

use Illuminate\Support\Facades\Route;
use Termwind\Components\Dd;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Andrei",
        "email" => "andrei@gmail.com",
        "age" => 25
    ]);
});

Route::get('/blog', function () {
    $blog_posts = [
        [
            "title" => "Post 1",
            "slug" => "post-1",
            "author" => "Muammar",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui dolorem inventore possimus maiores necessitatibus facere repellendus quod suscipit sequi voluptatum provident facilis, praesentium deleniti sed dolore veritatis veniam ducimus atque numquam accusamus fugiat aut repellat natus non. Repellat, officia. Rem ad fugit alias assumenda, corporis nobis itaque porro provident beatae?"
        ],
        [
            "title" => "Post 2",
            "slug" => "post-2",
            "author" => "Imank",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui dolorem inventore possimus maiores necessitatibus facere repellendus quod suscipit sequi voluptatum provident facilis, praesentium deleniti sed dolore veritatis veniam ducimus atque numquam accusamus fugiat aut repellat natus non. Repellat, officia. Rem ad fugit alias assumenda, corporis nobis itaque porro provident beatae? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, quasi!  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus libero laudantium quae recusandae. Illo minima praesentium nobis repudiandae dignissimos a? Magni a fugiat omnis voluptas commodi aperiam quisquam neque minima." 
        ]
    ];

    return view('posts', [
        "title" => "Posts",
        "posts" => $blog_posts
    ]);
});


// Page Single Post
Route::get('posts/{slug}', function ($slug) {
    $blog_posts = [
        [
            "title" => "Post 1",
            "slug" => "post-1",
            "author" => "Muammar",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui dolorem inventore possimus maiores necessitatibus facere repellendus quod suscipit sequi voluptatum provident facilis, praesentium deleniti sed dolore veritatis veniam ducimus atque numquam accusamus fugiat aut repellat natus non. Repellat, officia. Rem ad fugit alias assumenda, corporis nobis itaque porro provident beatae?"
        ],
        [
            "title" => "Post 2",
            "slug" => "post-2",
            "author" => "Imank",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui dolorem inventore possimus maiores necessitatibus facere repellendus quod suscipit sequi voluptatum provident facilis, praesentium deleniti sed dolore veritatis veniam ducimus atque numquam accusamus fugiat aut repellat natus non. Repellat, officia. Rem ad fugit alias assumenda, corporis nobis itaque porro provident beatae? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, quasi!  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus libero laudantium quae recusandae. Illo minima praesentium nobis repudiandae dignissimos a? Magni a fugiat omnis voluptas commodi aperiam quisquam neque minima." 
        ]
    ];

    $new_post = [];
    foreach($blog_posts as $post){
        // var_dump($post["slug"]);
        if($post["slug"] === $slug){
            $new_post = $post;
            // var_dump($new_post);die();
        }
    }
    
   return view('post',[
    "title" => "Single Post",
    "post" => $new_post
   ]); 
});