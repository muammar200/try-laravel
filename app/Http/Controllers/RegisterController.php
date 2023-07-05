<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register',
        ]);
    }

    public function store(Request $request)
    {
        // Membuat validasi bagi user yang regis
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // Memasukkan data user ka Model User (Tabel Database User)
        User::create($validatedData);

        // Membawa pesan success jika user telah berhasil registrasi
        // $request->session()->flash('success', 'Registration successfull
        // ! Please login');

        return redirect('/login')->with('success', 'Registration successfull! Please login!');
    }
}
