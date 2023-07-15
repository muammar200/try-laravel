<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use PhpParser\Node\Stmt\If_;
use Termwind\Components\Dd;

class PostController extends Controller
{
    public function index(){
        // $posts = Post::latest(); 

        // if(request('search')){
        //     $posts->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('excerpt', 'like', '%' . request('search') . '%');
        // }
            $title = '';
            if(request('category')){
                $category = Category::firstWhere('slug', request('category'));
                $title = " in " . $category->name;
            }
            if(request('author')){
                $category = \App\Models\User::firstWhere('username', request('author'));
                $title = " by " . $category->name;
            }

        return view('posts', [
            "title" => "All Posts" . $title,
            // "active" => "posts",
            "seeAll" => NULL,
            // Di bawah telah menggunakan class dari model POST dengan memanggil function all()
            // "posts" => Post::all()

            // Kode di bawah adalah kode untuk menampilkan blog ke halaman. Post adalah nama Model nya, latest() adalah function untuk mengurutkan postingan di mana yang paling atas adalah postingan terbaru. filter adalah function untuk memfilter data sesuai apa yang ditangkapnya, di mana isi functionnya ada di dalam Model Post.php
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->Paginate(7)->withQueryString()
            // withQueryString berfungsi untuk membawa apapun yang ada di query string sebelumnya (maksudnya yang ada di url).
            
            // Cara kerja filter category. Yaitu seperti yang diketahui bahwa ketika user mengklik suatu kategori, otomatis yang akan muncul hanya blog kategori tersebut. Saat melakukan pencarian setelah mengklik kategori tersebut, maka yang dia cari akan selalu berdasarkan kategori tersebut
            
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
            // "active" => "posts",
            "post" => $post
           ]);
    }
}
