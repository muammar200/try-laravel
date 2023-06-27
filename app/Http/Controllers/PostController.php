<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        return view('posts', [
            "title" => "Posts",
            // Di bawah telah menggunakan class dari model dengan memanggil function all()
            // "posts" => Post::all()
            "posts" => Post::latest()->get() //Menampilkan data terbaru ada di paling atas
        ]);
    }

    // public function show($id){
    //     return view('post',[
    //         "title" => "Single Post",
    //         "post" => \App\Models\Post::find($id)
    //        ]);
    // }

    public function show(Post $post){
        // var_dump($post);
        // die();
        return view('post',[
            "title" => "Single Post",
            "post" => $post
           ]);
    }
}
