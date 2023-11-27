@extends('layout.template')

@section('konten')
<div class="jumbotron mt-5">
    <h1 class="display-4" style="color: black;">Welcome to M-Search</h1>
    <p class="lead" style="color: black;">M-Search adalah sebuah web untuk melihat data-data pada mahasiswa. Web ini
    menyediakan berbagai fitur, seperti kita bisa menambahkan data mahasiswa, mengedit dan juga menghapus data yang ada.</p>
    <hr class="my-4">
    <p>Untuk lebih lengkapnya silahkan <strong>KLIK</strong> tombol dibawah ini.</p>
    <!-- Tombol navigasi menuju halaman data mahasiswa -->
    <a class="btn btn-dark btn-lg" href="/mahasiswa" role="button">Let's Go</a>
</div>
@endsection

