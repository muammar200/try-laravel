<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        return view('posts', [
            "title" => "All Posts",
            "active" => "posts",
            "seeAll" => NULL,
            // Di bawah telah menggunakan class dari model POST dengan memanggil function all()
            // "posts" => Post::all()

            // Kode di bawah menggunakan Eiger Load, untuk melakukan query mengambil data yang ada pada author dan category di awal load halaman Posts, sehingga saat di looping tidak melakukan query yang berulang, tapi langsung mengambil data yang ada pada Model Post. Kode ['author', 'category'] diambil dari function yang ada pada Model Post. Function author dan category memiliki kode untuk menghubungkan antar tabel (membuat relasinya) *silahkan cek sendiri kode pada Model Post jika ingin melihatnya
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
            "active" => "posts",
            "post" => $post
           ]);
    }
}
