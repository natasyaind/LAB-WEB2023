<?php

use App\Http\Controllers\mahasiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Rute untuk halaman utama (welcome)
Route::get('/', function () {
    return view('welcome');
});
// Rute resource untuk entitas Mahasiswa, menggunakan mahasiswaController
Route::resource('mahasiswa', mahasiswaController::class);
