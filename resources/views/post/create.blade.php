<!-- Menghubungkan dengan view template master -->
@extends('layout.app')

@section('judul', '- Tambah Postingan')

@section('konten')
    <div class="container mt-5">
        <a href="{{ route('post.index') }}">Kembali</a>
        <div class="row text-center text-md-left">
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail0">Gambar</label>
                    <input type="file" class="form-control" id="exampleInputEmail0" name="photo">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="judul">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">Deskripsi</label>
                    <input type="text" class="form-control" id="exampleInputEmail2" name="deskripsi">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-select" aria-label="Default select example" id="kategori" name="id_kategori">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                        @endforeach

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

    </div>
@endsection
