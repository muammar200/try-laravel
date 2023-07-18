@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <a href="/dashboard/posts">Back To Post</a>
            <a href="">Edit</a>
            <a href="">Delete</a>

            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top"
                alt="{{ $post->category->name }}">
            
            <article class="my-3 fs-5">
                {!! $post->content !!}
            </article>

            <a href="/dashboard/posts" class="text-decoration-none d-block mt-3">Back to Posts</a>
        </div>
    </div>
</div>

@endsection