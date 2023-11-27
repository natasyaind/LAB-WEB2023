@extends('layout.template') 
<!-- START FORM -->
@section('konten') 

<!-- // Form dengan aksi ke URL 'mahasiswa' dan metode 'post' -->
<form action='{{ url('mahasiswa') }}' method='post'>
@csrf  
<div class="p-5 rounded shadow-sm" style="margin-top: 45px; background-color: rgb(1, 2, 43)">
    <div class="mt-2 mb-3 row">
        <h2 class="fw-bold" style="color: white;">Create Data</h2>
    </div>
    <div class=" mt-3 mb-3 row">
        <label for="nim" class="col-sm-2 col-form-label" style="color: white;">NIM</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nim' value="{{ Session::get('nim') }}" id="nim">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label" style="color: white;">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}" id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tanggal_lahir" class="col-sm-2 col-form-label" style="color: white;">Tanggal Lahir</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name='tanggal_lahir' value="{{ Session::get('tanggal_lahir') }}" id="tanggal_lahir">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label" style="color: white;">Alamat</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='alamat' value="{{ Session::get('alamat') }}" id="alamat">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label" style="color: white;">Jurusan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='jurusan' value="{{ Session::get('jurusan') }}" id="jurusan">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <a href='{{ url('mahasiswa') }}' class="btn btn-danger btn-md"><i class="fa-solid fa-arrow-left fa-lg" style="color: #ffffff;"></i></a>
            <button type="submit" class="btn btn-success" name="submit" class="btn btn-danger btn-md"><i class="fa-solid fa-floppy-disk fa-lg" style="color: #ffffff;"></i></button>        </div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection