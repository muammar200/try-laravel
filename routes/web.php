<?php

// Cara menggunakan extension PHP Namespace Resolver, memudahkan import namespace : klik kanan -> import All Classes

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Models\Post;
use App\Models\Category;
// use App\Models\User;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Route;


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
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Andrei",
        "email" => "andrei@gmail.com",
        "age" => 25
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

// Page Single Post
// Route::get('posts/{slug}', [PostController::class, 'show']);

// Pada kode route di bawah, ketika kita meroute {post:slug}, maka secara otomatis akan mencari id nya sebagai identifier pada tabel database
// Route::get('posts/{post:slug}', [PostController::class, 'show']);

// Pada kode di bawah, kita menentukan bahwa yang akan dicari adalah atribute slug pada tabel db, bukan id nya
Route::get('posts/{post:slug}', [PostController::class, 'show']);


// Routes untuk menampilkan semua kategori yang ada
// Route::get('/categories', function(){
//         return view('categories', [
//             'title' => 'Post Categories',
//             'categories' => Category::all()
//         ]);
// });
Route::get('/categories', [CategoryController::class, 'index']);


// Route Category
//menggunakan route binding model
Route::get('/categories/{category:slug}', function(Category $category)
{
        return view('posts', [
            // Kode di bawah mencocokkan {category:slug} yang dikirim oleh Route dan mengambil name yang sama yang dimiliki oleh {category:slog}. Contoh jika {category:slug} memiliki value web-design. Maka pada tabel category akan mengambil name yang memiliki id yang sama pada slug web-design 
            'title' => "Post By Category : $category->name",
            "active" => "categories",
            
            'posts' => $category->posts->load('category', 'author'),
            // Kode di atas mencocokkan data untuk mengambil fild yang mana saja yang memiliki kategory sesuai yang dikirim oleh parameter {category:slug}, data yang dicocokkan yaitu antara Model Category dan Model Post. Pada model Post terdapat function berikut untuk relasi ke Model (tabel database) Category
            // public function posts(){
            //     return $this->hasMany(Post::class);
            // }
        ]);
});

Route::get('/authors/{author:username}', [AuthorController::class, 'index']); 