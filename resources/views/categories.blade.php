@extends('layouts.main')

@section('container')

<ul>
    @foreach ($categories as $category)
        <li>
            <h2>
                <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
            </h2>
        </li>
    @endforeach
</ul>
@endsection