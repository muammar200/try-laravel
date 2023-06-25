<?php

// Cara menggunakan extension PHP Namespace Resolver, memudahkan import namespace : klik kanan -> import All Classes

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Models\Post;
use App\Models\Category;
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
Route::get('/categories/{category:slug}', function(Category $category){
        return view('category', [
            'title' => $category->name,
            'posts' => $category->post,
            'category' => $category->name
        ]);
});