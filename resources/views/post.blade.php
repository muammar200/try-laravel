
@extends('layouts.main')

@section('container')
        {{-- Kode di bawah mengakses data menggunakan notasi array --}}
        {{-- <h2>{{ $post["title"] }}</h2>
        <h5>{{ $post["author"] }}</h5>
        <p>{{ $post["content"] }}</p> --}}

        {{-- Kode di bawah mengakses data menggunakan notasi object --}}
        <h1 class="mb-3">{{ $post->title }}</h1>
        <p>By. {{ $post->author->name }} in <a class="text-decoration-none" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

        {{-- <p>{{  $post->content }}</p> --}}
        {{-- Kode di bawah adalah bagaimana menampilkan suatu element dengan memfungsikan elemen html di dalamnya --}}
        {!! $post->content !!}
    <a href="/posts" class="text-decoration-none d-block mt-3">Back to Posts</a>
@endsection
