@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Post</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/dashboard/posts" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                required autofocus value="{{ old('title') }}">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label @error('slug') is-invalid @enderror">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug') }}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                @if (old('category_id') == $category->id)
                  <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()"> 
            {{-- property onchange pada tag input di atas, dibuat agar jika ada perubahan dalam tag input. Semisal yang tadinya input file kosong menjadi ada, maka property onchange akan berjalan dengan memanggil function previewImage() --}}
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
        {{-- penggunaan editor text : Trix--}}
        <div class="mb-3">
            <label for="content" class="form-label">Content</label> 
            @error('content')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="content" type="hidden" name="content" value="{{ old('content') }}">
            <trix-editor input="content"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function () {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
//     Tentu! Kode di atas adalah contoh kode JavaScript yang menggunakan Fetch API untuk berinteraksi dengan server dan menghasilkan slug berdasarkan judul post yang dimasukkan oleh pengguna.

// Mari kita bahas baris per baris:

// title.addEventListener('change', function () {: Kode ini menetapkan event listener pada elemen dengan ID title. Event listener akan merespons perubahan pada elemen tersebut, yang berarti ketika pengguna mengubah isi elemen input dengan ID title (misalnya, mengetikkan atau memasukkan teks baru), maka kode dalam fungsi anonim akan dijalankan.

// fetch('/dashboard/posts/checkSlug?title=' + title.value): Di baris ini, kita menggunakan Fetch API untuk melakukan permintaan HTTP ke server. Kode ini mengirim permintaan GET ke endpoint /dashboard/posts/checkSlug dengan parameter title yang diisi dengan nilai dari input title (yaitu judul post) yang telah dimasukkan oleh pengguna (title.value).

// .then(response => response.json()): Ini adalah bagian dari pengolahan respons dari permintaan sebelumnya. Fungsi ini mengambil objek response dari server dan mengubahnya menjadi format JSON dengan menggunakan metode json(). Kode ini menggunakan fungsi panjang => untuk menyederhanakan fungsi dan menjadikannya lebih ringkas.

// .then(data => slug.value = data.slug): Setelah data JSON diterima, kode ini mengambil nilai slug dari data dan menetapkan nilainya ke elemen dengan ID slug. Ini bermakna hasil slug dari judul post yang dihasilkan oleh server akan ditampilkan di elemen input dengan ID slug.

// Jadi, keseluruhan fungsi ini memungkinkan pengguna memasukkan judul post ke dalam input dengan ID title, dan kemudian melakukan permintaan ke server untuk menghitung slug berdasarkan judul tersebut. Hasil slug akan ditampilkan dalam elemen input dengan ID slug.

    // kode di bawah agar fitur upload file tidak dapat digunakan. Tapi kenapa harus dibuat? sementara display fiturnya sudah dihilangkan
    document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
    })

    // script untuk memunculkan gambar yang diupload
    // pelajari baik-baik javascript
    function previewImage(){
        const image = document.querySelector('#image');
        const imagePreview = document.querySelector('.img-preview');

        imagePreview.style.display = 'block';

        const ammar = new FileReader();
        ammar.readAsDataURL(image.files[0]);

        ammar.onload = function(muammar){
            imagePreview.src = muammar.target.result;
        }
    }

</script>

@endsection
