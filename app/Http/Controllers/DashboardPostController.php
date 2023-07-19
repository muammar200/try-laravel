<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('dashboard.posts.index',[
            // cari tau arti kode di bawah
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all() //untuk mengambil data pada tabel category di db. Hal tersebut bisa dilakukan karena model Category sudah berelasi dengan model Post
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts', //unique:posts = digunakan untuk memastikan bahwa nilai yang diberikan untuk field slug harus unik dalam tabel posts pada basis data.
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->content), 200);
        // Fungsi strip_tags() adalah sebuah fungsi dalam PHP yang digunakan untuk menghapus atau membuang tag HTML dan PHP dari sebuah string.
        // Ketika kita memiliki sebuah string yang mengandung kode HTML atau PHP, terkadang kita ingin menghilangkan tag-tag tersebut dan hanya mendapatkan teks biasa. Fungsi strip_tags() digunakan untuk melakukan hal tersebut.
        // Berikut adalah contoh penggunaan fungsi strip_tags():
        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success', 'New Post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.post',[
            "post" => $post
           ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // method update mirip dengan method store, kalau bingung lihat method store saja lalu samakan dengan method update
        // memberikan kondisi pada inputan slug agar dapat mengupdate blog tapi slug-nya tetap sama
        $rules = [
            'title' =>'required|max:255',
            'category_id' => 'required',
            'content' => 'required'
        ];
        
        if($request->slug != $post->slug){
            $rules['slug'] ='required|unique:posts,slug';
        }


        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->content), 200);
        
        Post::where('id', $post->id)->update($validatedData);
        
        return redirect('/dashboard/posts')->with('success', 'New Post has been added!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

//     Kode di atas adalah contoh fungsi dalam bahasa pemrograman PHP dengan menggunakan framework Laravel. Fungsi ini bertujuan untuk menghasilkan slug berdasarkan judul dari sebuah post.

// Mari kita bahas baris per baris:

// public function checkSlug(Request $request){: Ini adalah deklarasi fungsi dengan nama checkSlug. Fungsi ini menerima objek $request dari kelas Request sebagai parameter. Kelas Request adalah bagian dari Laravel yang menyediakan akses ke data permintaan HTTP.

// $slug = SlugService::createSlug(Post::class, 'slug', $request->title);: Di baris ini, kita menggunakan SlugService untuk membuat slug. Kelas SlugService mungkin merupakan bagian dari kode lain dalam aplikasi Laravel atau eksternal yang bertanggung jawab untuk membuat slug.

// SlugService::createSlug: Ini memanggil metode createSlug dari kelas SlugService.
// Post::class: Ini adalah referensi ke kelas Post. ::class digunakan untuk mendapatkan nama kualifikasi penuh (fully qualified name) dari kelas, yang biasanya digunakan ketika mengoperasikan nama kelas dalam bentuk string.
// 'slug': Ini adalah nama kolom dalam tabel database di mana slug akan disimpan.
// $request->title: Ini adalah judul post yang diberikan oleh pengguna melalui permintaan HTTP. Fungsi createSlug akan menggunakan judul ini untuk membuat slug.
// return response()->json(['slug' => $slug]);: Di baris ini, fungsi akan mengembalikan respons JSON yang berisi slug yang telah dibuat. Fungsi json() digunakan untuk membungkus data dalam format JSON, dan dalam kasus ini, data yang dikembalikan adalah array asosiatif dengan kunci 'slug' yang berisi nilai slug yang telah dibuat.

// Jadi, inti dari fungsi ini adalah menerima judul dari post melalui permintaan HTTP, menggunakan SlugService untuk membuat slug dari judul tersebut, dan mengirimkan slug tersebut kembali sebagai respons JSON ke pengguna.
}
