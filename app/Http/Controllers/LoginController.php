<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // session regenerate, untuk menghindari teknik kejahatan bernama session fixation. Yang inti dari cara kerjanya, yaitu men-generate ulang session
            return redirect()->intended('/dashboard');
            // digunakan intended, tidak langsung redirect ke halaman dashboard, supaya melewati middleware
        }
        // kondisi di atas untuk mengecek apakah email dan password valid atau tidak (ada di db atau tidak/sudah terdaftar sebelumnya atau tidak).
 
        //return back()->withErrors
        //dengan menggunakan cara di atas, maka pesan errornya akan masuk ke dalam variabel error pada halaman yang dituju

        return back()->with('loginError', 'Login failed!');
        //cara di atas untuk menggunakan flash message, kita buat variabel sendiri
    }

    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
        
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
    // function logout di atas ada di dokumentasi
}
