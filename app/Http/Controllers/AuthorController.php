<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;

// class AuthorController extends Controller
// {
    
//     public function index(User $author){ //Pastikan saat membuat Controller, jika memunculkan data pada model lain melalui parameter yang di tangkap oleh Route::get, pastikan untuk melakukan route model binding pada model tersebut. Contoh kode di mana route model binding di lakukan adalah parameter yang ada pada function index yaitu (User $author)
//         return view('posts', [
//             "title" => "Post By : $author->name",
//             "active" => "posts",
//             "seeAll" => NULL,
//             //Berikut penerapan Lazy Eager Loading. Dokumentasi Laravel menuliskan : Sometimes you may need to eager load a relationship after the parent model has already been retrieved.
//             "posts" => $author->posts->load('category', 'author'),
//             // Kode di atas berarti, setelah kita ambil semua postingan yang sesuai penulisnya ($author->posts : memanggil function posts pada Model User), maka category dan author nya juga akan sekalian di-load
//             //Lazy Eager Loading dilakukan pada data yang di binding 
//         ]);

//     }
// }
