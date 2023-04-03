<!-- Menghubungkan dengan view template master -->
@extends('layout.app')

@section('konten')
    <div class="container mt-5">
        <div class="row text-center text-md-left">
            <div class="col-md-3">
                <img src="assets/imgs/avatar.jpg" alt="" class="img-thumbnail mb-4">
            </div>
            <div class="pl-md-4 col-md-9">
                <h6 class="title">Mochammad Maulana</h6>
                <p class="subtitle">Laravel Developer</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, pariatur, aperiam aut autem
                    voluptas odit. Odio ducimus delectus totam sed aliquam sequi praesentium mollitia, illum
                    repudiandae quidem quod, magni magnam.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, eius, nam. Quo praesentium qui
                    temporibus voluptatum, facilis aliquid eligendi fugiat beatae neque inventore non. Laborum
                    repellendus consequatur ullam voluptatum asperiores.</p>
                <button class="btn btn-primary rounded mt-3">DOWNLOAD CV</button>
            </div>
        </div>
    </div>
@endsection
