@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<!-- Form untuk mengirim data mahasiswa ke URL yang sesuai, dengan method PUT -->
<form action='{{ url('mahasiswa/'.$data->nim) }}' method='post'>
<!-- Membuat token CSRF untuk keamanan form -->
@csrf 
<!-- Menggunakan method PUT untuk mengindikasikan bahwa form ini digunakan untuk mengubah data (update) -->
@method('PUT')
<div class="p-5 rounded shadow-sm" style="margin-top: 60px; background-color: rgb(49, 23, 35)">
    <div class="mb-3 row">
        <h2 class="fw-bold text-white">Edit</h2>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label text-white">Nama</label>
        <div class="col-sm-10">
            <!-- Input field untuk mengedit nama mahasiswa -->
            <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tanggal_lahir" class="col-sm-2 col-form-label text-white">Tanggal Lahir</label>
        <div class="col-sm-10">
            <!-- Input field untuk mengedit tanggal lahir mahasiswa -->
            <input type="date" class="form-control" name='tanggal_lahir' value="{{ $data->tanggal_lahir }}" id="tanggal_lahir">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label text-white">Alamat</label>
        <div class="col-sm-10">
            <!-- Input field untuk mengedit jurusan mahasiswa -->
            <input type="text" class="form-control" name='alamat' value="{{ $data->alamat }}" id="alamat">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label text-white">Jurusan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='jurusan' value="{{ $data->jurusan }}" id="jurusan">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label text-white"></label>
        <div class="col-sm-10">
            <!-- Tautan untuk kembali ke halaman daftar mahasiswa -->
            <a href='{{ url('mahasiswa') }}' class="btn btn-danger btn-md"><i class="fa-solid fa-arrow-left fa-lg" style="color: #ffffff;"></i></a>
            <button type="submit" class="btn btn-primary" name="submit" class="btn btn-danger btn-md"><i class="fa-solid fa-floppy-disk fa-lg" style="color: #ffffff;"></i></button>        </div>
        </div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection