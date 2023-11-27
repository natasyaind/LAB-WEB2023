@extends('layout.template')
<!-- START DATA -->
@section('konten')    
<div class="p-5 rounded shadow-sm" style="margin-top: 20px; background-color:rgb(251, 208, 255)">
    <div class="pb-2">
        <!-- Judul halaman data -->
        <h2 class="fw-bold" style="color: black;">Data Mahasiswa</h2>
    </div>

    <!-- FORM PENCARIAN -->
    <div class="pb-2">
        <form class="d-flex" action="{{ url('mahasiswa') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <!-- Form pencarian dengan input kata kunci -->
            <button class="btn btn-dark" type="submit">Cari</button>
        </form>
    </div>

{{-- untuk cek data ada atau tidak --}}
@if(isset($pesan))
    <div class="alert alert-warning">
        {{ $pesan }}
    </div>
@endif


    <div class="row">
        <?php $i = $data->firstItem()?>
        @foreach ($data as $item)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://i.pinimg.com/originals/10/fd/72/10fd72124736cfa1b9840c5ee543b0cf.jpg" class="card-img-top" alt="gambar">
                    <div class="card-body">
                        <h5 class="card-title text-center fw-bold align-middle">{{ $item->nama }}</h5>
                        <p class="text-center align-middle mb-1 ">NIM : {{ $item->nim }}</p>
                        <p class="text-center align-middle">Jurusan : {{ $item->jurusan }}</p>
                        <a href="{{ url('mahasiswa/'.$item->nim) }}" class="btn btn-outline-primary mt-4">Details</a>

                        <!-- Tombol Edit -->
                        <a href="{{ url('mahasiswa/'.$item->nim.'/edit') }}" class="btn btn-warning btn-sm mt-4">
                            <i class="fa-solid fa-pen-to-square fa-lg"></i>
                        </a>

                        <!-- Tombol Delete -->
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('mahasiswa/'.$item->nim) }}" method="post">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm mt-4">
                                <i class="fa-solid fa-trash fa-lg"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php $i++?>
        @endforeach
        <!-- Pagination untuk memudahkan navigasi halaman -->
        {{ $data->withQueryString()->links() }}
    </div>
    
  
    

    {{-- <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1 text-center align-middle">No</th>
                <th class="col-md-3 text-center align-middle">NIM</th>
                <th class="col-md-4 text-center align-middle">Nama</th>
                <th class="col-md-2 text-center align-middle">Jurusan</th>
                <th class="col-md-2 text-center align-middle">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            <!-- Looping data mahasiswa -->
            @foreach ($data as $item)
            <tr>
                <td class="text-center align-middle">{{ $i }}</td>
                <td class="text-center align-middle">{{ $item->nim }}</td>
                <td class="text-center align-middle">{{ $item->nama }}</td>
                 <!-- Tombol aksi untuk setiap data mahasiswa -->
                <td class="text-center align-middle">{{ $item->jurusan }}</td>
                <td class="text-center align-middle">
                    <a href="{{ url('mahasiswa/'.$item->nim) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-info fa-lg"></i></a>
                    <a href="{{ url('mahasiswa/'.$item->nim.'/edit') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('mahasiswa/'.$item->nim) }}" method="post">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash fa-lg"></i></button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
            
        </tbody>
    </table> --}}
    
</div>
<!-- AKHIR DATA -->
@endsection
    