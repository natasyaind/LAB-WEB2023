<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // Menampilkan daftar mahasiswa
    public function index(Request $request) {
        $katakunci = $request->input('katakunci');
        $jumlahbaris = 6;

    if (strlen($katakunci)) {
        $data = Mahasiswa::where('nim', 'like', "%$katakunci%")
            ->orWhere('nama', 'like', "%$katakunci%")
            ->orWhere('jurusan', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);

        // Memeriksa apakah hasil pencarian kosong
        if ($data->isEmpty()) {
            // Jika hasil pencarian kosong, berikan pesan bahwa data tidak ditemukan
            return view('mahasiswa.index')->with('data', $data)->with('pesan', 'Data tidak ditemukan.');
        }
    } else {
        $data = Mahasiswa::orderBy('nim', 'desc')->paginate($jumlahbaris);
    }

    // Mengirim data ke view 'mahasiswa.index'
    return view('mahasiswa.index')->with('data', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Menampilkan form untuk membuat data mahasiswa baru
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Menyimpan data mahasiswa baru ke dalam penyimpanan.
    public function store(Request $request)
    {
        // Flash data yang diinputkan untuk ditampilkan kembali ke form jika terjadi validasi error
        Session::flash('nim', $request->nim);
        Session::flash('nama', $request->nama);
        Session::flash('tanggal_lahir', $request->tanggal_lahir);
        Session::flash('alamat', $request->alamat);
        Session::flash('jurusan', $request->jurusan);

        // Validasi data input dari form
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
        ], [
            // Pesan-pesan validasi kustom.
            'nim.required' => 'NIM wajib diisi',
            'nim.numeric' => 'NIM wajib dalam angka',
            'nim.unique' => 'NIM yang diisikan sudah ada dalam database',
            'nama.required' => 'Nama wajib diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
        ]);
        // Menyimpan data baru ke dalam database.
        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'jurusan' => $request->jurusan,
        ];
        mahasiswa::create($data);
        // Redirect ke halaman 'mahasiswa' dengan pesan sukses
        return redirect()->to('mahasiswa')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Menampilkan detail data mahasiswa berdasarkan NIM.
    public function show($nim)
    {
        $data = Mahasiswa::where('nim', $nim)->first();

        //Jika data tidak ditemukan, redirect ke halaman daftar mahasiswa dengan pesan error
        if (!$data) {
            return redirect()->route('mahasiswa.index')->with('error', 'Data Mahasiswa tidak ditemukan');
        }

        // Mengirim data ke view 'mahasiswa.details'.
        return view('mahasiswa.details', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Menampilkan form untuk mengedit data mahasiswa berdasarkan NIM.
    public function edit($id)
    {
        // Mengambil data mahasiswa berdasarkan NIM.
        $data = mahasiswa::where('nim', $id)->first();
        // Mengirim data ke view 'mahasiswa.edit'.
        return view('mahasiswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari form.
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
        ], [
            // Pesan-pesan validasi kustom.
            'nama.required' => 'Nama wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
        ]);
        // Data yang akan diupdate.
        $data = [
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'jurusan' => $request->jurusan,
        ];
        //Melakukan update data mahasiswa berdasarkan NIM.
        mahasiswa::where('nim', $id)->update($data);
        // Redirect ke halaman 'mahasiswa' dengan pesan sukses.
        return redirect()->to('mahasiswa')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Menghapus data mahasiswa berdasarkan NIM.
        mahasiswa::where('nim', $id)->delete();
        // Redirect ke halaman 'mahasiswa' dengan pesan sukses.
        return redirect()->to('mahasiswa')->with('success', 'Berhasil melakukan delete data');
    }
}
