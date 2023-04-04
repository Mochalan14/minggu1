<!-- Menghubungkan dengan view template master -->
@extends('layout.app')

@section('judul', '- Post')

@section('konten')
    <div class="container mt-5">
        <a href="{{ route('post.create') }}" class="btn btn-warning">Tambah Postingan</a>
        <div class="row mt-3 text-center justify-content-center">
            @foreach ($posts as $post)
                <div class="col-3 card m-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->Judul }}</h5>
                        <p class="card-text">{{ $post->Deskripsi }}</p>
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
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
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
