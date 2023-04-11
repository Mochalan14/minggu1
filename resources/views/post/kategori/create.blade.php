<!-- Menghubungkan dengan view template master -->
@extends('layout.app')

@section('judul', '- Tambah Kategori')

@section('konten')
    <div class="container mt-5">
        <a href="{{ route('post.index') }}">Kembali</a>
        <div class="row text-center text-md-left">
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kategori</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_kategori">
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

    </div>
@endsection
