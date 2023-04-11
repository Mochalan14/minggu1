div
<!-- Menghubungkan dengan view template master -->
@extends('layout.app')

@section('judul', '- Post')

@section('konten')
    <div class="container mt-5">
        <a href="{{ route('post.create') }}" class="btn btn-warning">Tambah Postingan</a>
        <a href="{{ route('kategori.create') }}" class="btn btn-warning">Tambah Kategori</a>
        @foreach ($kategori as $item)
            <a href="{{ route('post.category', $item->id) }}" class="btn btn-primary">{{ $item->nama_kategori }}</a>
        @endforeach
        <div class="row mt-3 text-center justify-content-center">
            @foreach ($posts as $post)
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
        </div>

        <table id="exampleTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($post->photo != null)
                                <div style="width:200px">
                                    <img src="{{ asset('storage/' . $post->photo) }}" class="img-fluid" alt="...">

                                </div>
                            @else
                                <p class="text-info">tidak ada foto</p>
                            @endif
                        </td>
                        <td>{{ $post->Judul }}</td>
                        <td>{{ $post->Deskripsi }}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('post.delete', $post->id) }}" method="post">

                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>

                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
