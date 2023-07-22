@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Post Categories</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close ms-auto me-0" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

<div class="table-responsive small col-lg-6">
  <a href="/dashboard/posts/create">Tambah Category</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Category Name</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
    @foreach ($categories as $category)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $category->name }}</td>
      <td>
        {{-- link pada tag a di bawah adalah aturan default untuk mengakses method edit pada resource DashboardPostController --}}
        <a href="/dashboard/posts/{{ $category->slug }}/edit">Update</a>
        <form action="/dashboard/posts/{{ $category->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button onclick="return confirm('Are you sure?')">
              Delete
            </button>
        </form>
      </td>
    </tr> 
    @endforeach
  </table>
</div>
@endsection