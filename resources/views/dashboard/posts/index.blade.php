@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Posts</h1>
</div>

<div class="table-responsive small col-lg-8">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
    @foreach ($posts as $post)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $post->title }}</td>
      {{-- cari tau kode di bawah, category itu sebenarnya apa? --}}
      <td>{{ $post->category->name }}</td>
      <td>
        <a href="/dashboard/posts/{{ $post->slug }}">Lihat</a>
        <a href="">Update</a>
        <a href="">Delete</a>
      </td>
    </tr> 
    @endforeach
  </table>
</div>
@endsection