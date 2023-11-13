@extends('layout/template')


@section('content')
    <style>
        .container {
            height: 50vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

    <div class="container">
        <a href="/products" class="btn btn-info">KLIK INI UNTUK PERGI BELANJA!</a>
    </div>
@endsection
