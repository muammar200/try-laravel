
@extends('layouts.main')

@section('container')
    <article>
        {{-- Kode di bawah mengakses data menggunakan notasi array --}}
        {{-- <h2>{{ $post["title"] }}</h2>
        <h5>{{ $post["author"] }}</h5>
        <p>{{ $post["content"] }}</p> --}}

        {{-- Kode di bawah mengakses data menggunakan notasi object --}}
        <h2>{{ $post->title }}</h2>
        <h5>{{ $post->author }}</h5>
        {{-- <p>{{  $post->content }}</p> --}}
    
        {{-- Kode di bawah adalah bagaimana menampilkan suatu element dengan memfungsikan elemen html di dalamnya --}}
        {!! $post->content !!}
    </article>
    <a href="/posts">Back to Posts</a>
@endsection
