<?php

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;

Route::get('/', function () {
    return view('frontend.beranda.beranda');
})->name('beranda');

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login-proses', [UserController::class, 'proses'])->name('login-proses');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/dasbor', function () {
    $totalMahasiswa = Mahasiswa::count();
    $totalDosen = Dosen::count();
    $totalMatakuliah = Matakuliah::count();
    return view('backend.dasbor', compact('totalMahasiswa', 'totalDosen', 'totalMatakuliah'));
})->name('dasbor');

Route::resource('dosen', DosenController::class);
Route::resource('matakuliah', MatakuliahController::class);
Route::resource('jadwal', JadwalController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('absensi', AbsensiController::class);
Route::get('/absensi/{jadwal}', [AbsensiController::class, 'show'])->name('absensi.show');

Route::get('simulasi-heliport', function () {
    return view('frontend.heliport.simulasi-heliport');
})->name('simulasi-heliport');
Route::get('simulasi-heliport-3d', function () {
    return view('frontend.heliport.simulasi-heliport3d');
})->name('simulasi-heliport-3d');

Route::get('jadwal-tlb', [JadwalController::class, 'jadwalTlb'])->name('jadwal-tlb');
Route::get('jadwal-mbu', [JadwalController::class, 'jadwalMbu'])->name('jadwal-mbu');

