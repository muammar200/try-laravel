
@extends('layouts.main')

@section('container')
    <article>
        {{-- Kode di bawah mengakses data menggunakan notasi array --}}
        {{-- <h2>{{ $post["title"] }}</h2>
        <h5>{{ $post["author"] }}</h5>
        <p>{{ $post["content"] }}</p> --}}

        {{-- Kode di bawah mengakses data menggunakan notasi object --}}
        <h1>{{ $post->title }}</h1>
        <p>By. Muammar in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

        {{-- <p>{{  $post->content }}</p> --}}
        {{-- Kode di bawah adalah bagaimana menampilkan suatu element dengan memfungsikan elemen html di dalamnya --}}
        {!! $post->content !!}
    </article>
    <a href="/posts">Back to Posts</a>
@endsection
