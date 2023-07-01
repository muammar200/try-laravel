{{-- dd: dump die, like var_dump but this is use in Laravel --}}
{{-- @dd($posts); --}}

@extends('layouts.main')

@section('container')
<style>
    a {
        text-decoration: none;
    }

</style>
<h1 class="mb-5">
    {{ $title }}
</h1>
<div class="card mb-3">
    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
        alt="{{ $posts[0]->category->name }}">
    <div class="card-body text-center">
        <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-dark">{{ $posts[0]->title }}</a></h3>
        <p>
            <small class="text-body-secondary">
                By. <a href="/authors/{{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a
                    href="/categories/{{ $posts[0]->category->slug }}"
                    class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                {{ $posts[0]->created_at->diffForHumans() }}
                {{-- diffForHumans(), function yang berfungsi untuk memudahkan pembacaan waktu --}}
            </small>
        </p>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a href="/posts/{{ $posts[0]->slug }} " class="text-decoration-none btn btn-primary">Read more...</a>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                    <a
                    href="/categories/{{ $post->category->slug }}"
                    class="text-light">{{ $post->category->name }}</a>
                </div>
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top"
                    alt="{{ $post->category->name }}">
                <div class="card-body">
                    <h5 class="card-title"><a href="/posts/{{ $post->slug }}"
                            class="text-decoration-none">{{ $post->title }}</a></h5>
                    <p>
                        <small class="text-body-secondary">
                            By. <a href="/authors/{{ $posts[0]->author->username }}">{{ $post->author->name }}</a>
                            {{ $post->created_at->diffForHumans() }}
                            {{-- diffForHumans(), function yang berfungsi untuk memudahkan pembacaan waktu --}}
                        </small>
                    </p>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="/posts/{{ $post->slug }} " class="btn btn-primary">Read more...</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- @foreach ($posts->skip(1) as $post)
Method skip(1) : Digunakan untuk menskip data pertama. Kalau skip(2), berarti menskip data pertama dan data kedua
<article class="mb-5 border-bottom pb-4">
    Kode di bawah mengakses data menggunakan notasi array
    <h2>
            <a href="/posts/{{ $post["id"] }}">{{ $post["title"] }}</a>
    </h2>
    <h5>By : {{ $post["author"] }}</h5>
    <p>{{ $post["excerpt"] }}</p>

    Kode di bawah mengakses data menggunakan notasi object
    <h2>
        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
    </h2>
    <p>By. <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a
            href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
    </p>
    Arti kode $post->author->username adalah memanggil method author lalu memaggil data username. Method author ada pada halaman Model/Post.php *mungkin, pelajari lebih lanjut
    <h5>By : {{ $post["author"] }}</h5>
    <p>{{ $post->excerpt }}</p>

    <a href="/posts/{{ $post->slug }} " class="text-decoration-none">Read more...</a>
</article>
@endforeach --}}
@endsection
