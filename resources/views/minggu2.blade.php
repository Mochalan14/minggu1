<!-- Menghubungkan dengan view template master -->
@extends('layout.app')

@section('judul', '- Minggu 2')

@section('konten')
    <div class="container mt-5">
        <div class="row text-center">
            <h3>User tanggal 14</h3>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users14 as $user)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <h3>Semua User</h3>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
