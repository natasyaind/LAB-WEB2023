<?php
// Namespace untuk model 'mahasiswa'.
namespace App\Models;
// Menggunakan trait HasFactory dari Eloquent.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Kelas model 'mahasiswa' yang extends ke kelas Model dari Eloquent.
class mahasiswa extends Model
{
    use HasFactory;
    // Kolom-kolom yang dapat diisi (fillable) pada model.
    protected $fillable = ['nim', 'nama', 'tanggal_lahir', 'alamat', 'jurusan'];
    // Nama tabel yang akan digunakan oleh model.
    protected $table = 'mahasiswa';
    // Menonaktifkan timestamps (created_at dan updated_at) pada model.
    public $timestamps = false;
}
