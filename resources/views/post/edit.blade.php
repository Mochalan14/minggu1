@extends('layout.app')

@section('judul', '- Edit Postingan')

@section('konten')
    <div class="container mt-5">
        <a href="{{ route('post.index') }}">Kembali</a>
        <div class="row text-center text-md-left">
            @foreach ($post as $item)
                <form action="{{ route('post.update', $item->id) }}" method="post">
                    @method('put')
                    @csrf
                    {{-- <input type="hidden" value="{{ $item->id }}" name="id"> --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="judul"
                            value="{{ $item->Judul }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Deskripsi</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" name="deskripsi"
                            value="{{ $item->Deskripsi }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            @endforeach

        </div>

    </div>
@endsection
