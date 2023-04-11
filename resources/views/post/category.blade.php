div
<!-- Menghubungkan dengan view template master -->
@extends('layout.app')

@section('judul', '- Post')

@section('konten')
    <div class="container mt-5">
        <a href="{{ route('post.index') }}" class="btn btn-danger">Kembali</a>
        <div class="row mt-3 text-center justify-content-center">
            @foreach ($kategoris as $kategori)
                @foreach ($kategori->fkPost as $post)
                    <div class="col-3 card m-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->Judul }}</h5>
                            <p class="card-text">{{ $post->Deskripsi }}</p>
                            <p class="btn btn-success">{{ $post->fkCategory->nama_kategori }}</p>
                            {{-- <a href="/post/edit/{{ $post->id }}" class="card-link">Edit</a>
                    <a href="#" class="card-link">Hapus</a> --}}
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
