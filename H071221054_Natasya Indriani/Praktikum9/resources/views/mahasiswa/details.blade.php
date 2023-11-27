@extends('layout.template')
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h2 class="text-center fw-bold">Detail Mahasiswa</h2>
    <hr class="border border-dark border-2 opacity-50">
    <center><img src="https://i.pinimg.com/originals/10/fd/72/10fd72124736cfa1b9840c5ee543b0cf.jpg" alt="" style="max-height: 300px; max-width: 300px"></center>
    <hr class="border border-dark border-2 opacity-50">
    <div class="container p-3">
        <table class="table">
            <tbody>
                <tr>
                    <td class="fw-bold">NIM</td>
                    <td>:</td>
                    {{-- Menampilkan data NIM dari variabel $data --}}
                    <td>{{ $data->nim }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Nama</td>
                    <td> : </td>
                    {{-- Menampilkan data nama dari variabel $data --}}
                    <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Tanggal Lahir</td>
                    <td> : </td>
                    {{-- Menampilkan data tanggal_lahir setelah diubah formatnya --}}
                    <td>{{ date('d F Y', strtotime($data->tanggal_lahir)) }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Alamat</td>
                    <td> : </td>
                    {{-- Menampilkan data alamat dari variabel $data --}}
                    <td>{{ $data->alamat }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Jurusan</td>
                    <td> : </td>
                    {{-- Menampilkan data jurusan dari variabel $data --}}
                    <td>{{ $data->jurusan }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ url('mahasiswa') }}" class="btn btn-danger btn-md"><i class="fa-solid fa-arrow-left fa-lg" style="color: #ffffff;"></i></a>
    </div>
    
</div>
@endsection