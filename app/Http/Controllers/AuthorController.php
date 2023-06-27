<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthorController extends Controller
{
    
    public function index(User $author){ //Pastikan saat membuat Controller, jika memunculkan data pada model lain, pastikan untuk melakukan route model binding pada model tersebut
        return view('posts', [
            "title" => "Author Posts",
            // var_dump($user), die(),
            "posts" => $author->posts,            
        ]);

    }
}
