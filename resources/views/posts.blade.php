{{-- dd: dump die, like var_dump but this is use in Laravel --}}
{{-- @dd($posts); --}}

@extends('layouts.main')

@section('container')
    <h1 class="mb-5">
        Halaman Blog Posts    
    </h1>
    @foreach ($posts as $post)
    <article class="mb-5 border-bottom pb-4">
        {{-- Kode di bawah mengakses data menggunakan notasi array --}}
        {{-- <h2>
            <a href="/posts/{{ $post["id"] }}">{{ $post["title"] }}</a>
        </h2> --}}
        {{-- <h5>By : {{ $post["author"] }}</h5> --}}
        {{-- <p>{{ $post["excerpt"] }}</p> --}}
        
        {{-- Kode di bawah mengakses data menggunakan notasi object --}}
        <h2>
            <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
        </h2>
        <p>By. <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p> 
        {{-- Arti kode $post->author->username adalah memanggil method author lalu memaggil data username. Method author ada pada halaman Model/Post.php *mungkin, pelajari lebih lanjut--}}
        {{-- <h5>By : {{ $post["author"] }}</h5> --}}
        <p>{{ $post->excerpt }}</p>

        <a href="/posts/{{ $post->slug }} " class="text-decoration-none">Read more...</a>
    </article>
    @endforeach
@endsection