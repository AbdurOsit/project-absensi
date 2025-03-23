<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AbsenUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WaktuController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;


// Login And Register
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('auth');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/layout2', function(){
        return view('absensi.admin2.layout',[
            'title' => 'title'
    ]);
    })->name('absensi.layout');
    // Route::resource('absensi',AbsensiHadirController::class);
        // Admin
        Route::get('/admin', [AbsensiController::class, 'index'])->name('admin.index');
        // Admin CRUD
        Route::get('/admin/input', [AbsensiController::class, 'input'])->name('admin.input');
        Route::get('/input/form', [AbsensiController::class, 'input_form'])->name('admin.input_form');
        Route::post('/input', [AbsensiController::class, 'store'])->name('admin.store');
        Route::get('/admin/update/{id}', [AbsensiController::class, 'update'])->name('admin.update');
        Route::put('/update/{id}', [AbsensiController::class, 'update_process'])->name('admin.update_process');
        Route::delete('/admin/delete/{id}', [AbsensiController::class, 'delete'])->name('admin.delete');
        // Data
        Route::get('/admin/data', [AbsensiController::class, 'data'])->name('admin.data');
        // Rekap
        Route::get('/admin/rekap', [AbsensiController::class, 'rekap'])->name('admin.rekap');
        // Waktu
        Route::get('/admin/waktu', [WaktuController::class, 'index'])->name('admin.waktu');
        Route::get('/waktu/create', [WaktuController::class, 'create'])->name('waktu.create');
        Route::post('/waktu/create', [WaktuController::class, 'create_proccess'])->name('waktu.create.proccess');
        Route::get('/waktu/update/{id}', [WaktuController::class, 'update'])->name('waktu.update');
        Route::put('/waktu/update/{id}', [WaktuController::class, 'update_proccess'])->name('waktu.update.proccess');
        Route::delete('/waktu/delete/{id}', [WaktuController::class, 'delete'])->name('waktu.delete');
        // Jadwal(Tugas,Praktek,Kegiatan)
        Route::get('/admin/jadwal', [AbsensiController::class, 'jadwal'])->name('admin.jadwal');
        // Tugas
        Route::get('/tugas/create', [AbsensiController::class, 'tugas_input'])->name('tugas.input');
        Route::post('/tugas/create', [AbsensiController::class, 'tugas_create'])->name('tugas.create');
        Route::get('/tugas/update/{id}', [AbsensiController::class, 'tugas_update'])->name('tugas.update');
        Route::put('/tugas/update/{id}', [AbsensiController::class, 'tugas_update_proccess'])->name('tugas.update_proccess');
        Route::delete('/tugas/delete/{id}', [AbsensiController::class, 'tugas_delete'])->name('tugas.delete');
        // Scan
        Route::get('/admin/scan', [AbsensiController::class, 'scan'])->name('admin.scan');
        Route::post('/scan/input', [AbsensiController::class, 'scan_input'])->name('scan.input');
        Route::get('/get-latest-scan', [AbsensiController::class, 'getLatestScan'])->name('get.latest.scan');
        // Surat
        Route::get('/admin/surat', [AbsensiController::class, 'surat'])->name('admin.surat');
        Route::post('/admin/surat', [AbsensiController::class,'surat_proccess'])->name('surat.proccess');
        // Status
        Route::put('/update-status/{uid}', [AbsensiController::class, 'updateStatus'])->name('updateStatus');
    // Guru
        Route::get('/guru', [AbsensiController::class, 'guru_index'])->name('guru.index');
        Route::get('/guru/data', [AbsensiController::class, 'guru_data'])->name('guru.data');
        Route::get('/guru/rekap', [AbsensiController::class, 'guru_rekap'])->name('guru.rekap');

    // Siswa
        Route::get('/layout', [SiswaController::class, 'siswa_layout'])->name('siswa.layout');
        Route::get('/user', [SiswaController::class, 'siswa_index'])->name('siswa.index');
        Route::get('/user/rekap', [SiswaController::class, 'siswa_rekap'])->name('siswa.rekap');
        Route::get('/profile/update/{uid}', [SiswaController::class, 'profile_update'])->name('profile.update');
        Route::put('/profile/update/{uid}', [SiswaController::class, 'profile_update_proccess'])->name('profile.update_proccess');
    // Search (bisa diakses oleh semua role yang login)
    Route::get('/search', [SearchController::class, 'search'])->name('search');
});
