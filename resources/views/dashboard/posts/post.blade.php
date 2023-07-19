@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <a href="/dashboard/posts">Back To Post</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit">Update</a>
            {{-- cari cara, bagaimana kalau saat mengupdate di halaman post.blade.php(single post), saat masuk di form update, kemudian button update diklik, akan redirect ke halaman single post, jangan halaman my posts --}}
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button onclick="return confirm('Are you sure?')">
                  Delete
                </button>
            </form>

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

            <a href="/dashboard/posts" class="text-decoration-none d-block mt-3">Back to Posts</a>
        </div>
    </div>
</div>

@endsection