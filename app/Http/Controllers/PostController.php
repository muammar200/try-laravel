<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        return view('posts', [
            "title" => "Posts",
            // Di bawah telah menggunakan class dari model dengan memanggil function all()
            "posts" => \App\Models\Post::all()
            //penggunaan namespace juga bisa seperti di atas
        ]);
    }

    public function show($slug){
        return view('post',[
            "title" => "Single Post",
            "post" => \App\Models\Post::find($slug)
           ]);
    }
}
