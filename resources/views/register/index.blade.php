@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration ">
            <h1 class="h3 mb-3 fw-normal text-center">Please register</h1>
        <form action="/register" method="POST">
          {{-- csrf(cross-site request forgery) di bawah adalah teknik pengamananan website yang dimiliki Laravel. Di mana setiap data yang dikirimkan melalui form akan diamankan dengan cara dibuatkan/generate token khusus. Dan oleh laravel, token tersebut akan dicocokkan, apakah valid atau tidak--}}
          @csrf
          <div class="form-floating">
            <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
            {{-- old('name') : untuk menyimpan data user yang telah diinputkan sebelumnya jikalau semisal user gagal regis, maka apa yang sudah diketik akan autofill pada form inputan --}}
            <label for="name">Name</label>
            @error('name') 
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
            {{-- @error
                menampilkan pesan error berdasarkan name pada inputan
              @enderror--}}
          </div>
          <div class="form-floating">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
            <label for="username">Username</label>
            @error('username') 
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email') 
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password') 
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
        </form>
        <main class="form-signin w-100 m-auto">
        </main>
        <small class="d-block text-center mt-3">Already registered? <a href="/login">Login Now!</a></small>
        </main>
    </div>
</div>
@endsection