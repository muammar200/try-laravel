@extends('layouts.main')

@section('container')
<style>
    a{
        text-decoration: none;
    }
</style>
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <p>By. <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }} </a> in <a
                    class="text-decoration-none"
                    href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>

                    @if ($post->image)
                    <div style="max-height: 400px; overflow:hidden;">                
                        <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top"
                            alt="{{ $post->category->name }}">
                    </div>
                    @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top"
                        alt="{{ $post->category->name }}">
                    @endif
            
            <article class="my-3 fs-5">
                {!! $post->content !!}
            </article>

            <a href="/posts" class="text-decoration-none d-block mt-3">Back to Posts</a>
        </div>
    </div>
</div>
@endsection
