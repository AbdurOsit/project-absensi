<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AbsenUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WaktuController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Login And Register
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('auth');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/', function () {
        // return view('welcome');
        return view('absensi.login.login');
    });
    Route::get('/layout2', function(){
        return view('absensi.admin2.layout',[
            'title' => 'title'
    ]);
    })->name('absensi.layout');
    // Route::resource('absensi',AbsensiHadirController::class);

    Route::middleware(['role:admin'])->group(function(){
        // Admin
        Route::get('/admin', [AbsensiController::class, 'index'])->name('admin.index');
        // routes/web.php
    
        // Admin CRUD
        Route::get('/admin/input', [AbsensiController::class, 'input'])->name('admin.input');
        Route::get('/input/form', [AbsensiController::class, 'input_form'])->name('admin.input_form');

        // Input
        Route::post('/input', [AbsensiController::class, 'store'])->name('admin.store');
        Route::get('/admin/update/{id}', [AbsensiController::class, 'update'])->name('admin.update');
        Route::put('/update/{id}', [AbsensiController::class, 'update_process'])->name('admin.update_process');
        Route::delete('/admin/delete/{id}', [AbsensiController::class, 'delete'])->name('admin.delete');
        // Data
        Route::get('/admin/data', [AbsensiController::class, 'data'])->name('admin.data');
        // Rekap
        Route::get('/admin/rekap', [AbsensiController::class, 'rekap'])->name('admin.rekap');
        Route::get('/admin/rekap-detail/{username}', [AbsensiController::class, 'rekap_detail'])->name('rekap.detail');
        // Waktu
        Route::get('/admin/waktu', [WaktuController::class, 'index'])->name('admin.waktu');
        Route::get('/waktu/create', [WaktuController::class, 'create'])->name('waktu.create');
        Route::post('/waktu/create', [WaktuController::class, 'create_proccess'])->name('waktu.create.proccess');
        Route::get('/waktu/update/{id}', [WaktuController::class, 'update'])->name('waktu.update');
        Route::put('/waktu/update/{id}', [WaktuController::class, 'update_proccess'])->name('waktu.update.proccess');
        Route::delete('/waktu/delete/{id}', [WaktuController::class, 'delete'])->name('waktu.delete');

        // Jumlah Tidak Hadir
        Route::get('/admin/tidak_hadir', [AbsensiController::class, 'tidak_hadir'])->name('admin.tidak_hadir');

        // Jadwal(Tugas,Praktek,Kegiatan)
        Route::get('/admin/jadwal', [AbsensiController::class, 'jadwal'])->name('admin.jadwal');
        // Tugas
        Route::get('/tugas/create', [JadwalController::class, 'tugas_input'])->name('tugas.input');
        Route::post('/tugas/create', [JadwalController::class, 'tugas_create'])->name('tugas.create');
        Route::get('/tugas/update/{id}', [JadwalController::class, 'tugas_update'])->name('tugas.update');
        Route::put('/tugas/update/{id}', [JadwalController::class, 'tugas_update_proccess'])->name('tugas.update_proccess');
        Route::delete('/tugas/delete/{id}', [JadwalController::class, 'tugas_delete'])->name('tugas.delete');
        // Praktek
        Route::get('/praktek/create', [JadwalController::class, 'praktek_input'])->name('praktek.input');
        Route::post('/praktek/create', [JadwalController::class, 'praktek_create'])->name('praktek.create');
        Route::get('/praktek/update/{id}', [JadwalController::class, 'praktek_update'])->name('praktek.update');
        Route::put('/praktek/update/{id}', [JadwalController::class, 'praktek_update_proccess'])->name('praktek.update_proccess');
        Route::delete('/praktek/delete/{id}', [JadwalController::class, 'praktek_delete'])->name('praktek.delete');
        // Kegiatan
        Route::get('/kegiatan/create', [JadwalController::class, 'kegiatan_input'])->name('kegiatan.input');
        Route::post('/kegiatan/create', [JadwalController::class, 'kegiatan_create'])->name('kegiatan.create');
        Route::get('/kegiatan/update/{id}', [JadwalController::class, 'kegiatan_update'])->name('kegiatan.update');
        Route::put('/kegiatan/update/{id}', [JadwalController::class, 'kegiatan_update_proccess'])->name('kegiatan.update_proccess');
        Route::delete('/kegiatan/delete/{id}', [JadwalController::class, 'kegiatan_delete'])->name('kegiatan.delete');
        // Scan
        Route::get('/admin/scan', [AbsensiController::class, 'scan'])->name('admin.scan');
        Route::post('/scan/input', [AbsensiController::class, 'scan_input'])->name('scan.input');
        Route::get('/get-latest-scan', [AbsensiController::class, 'getLatestScan'])->name('get.latest.scan');
        // Surat
        Route::get('/admin/surat', [AbsensiController::class, 'surat'])->name('admin.surat');
        Route::post('/admin/surat', [AbsensiController::class,'surat_proccess'])->name('surat.proccess');

        // profile
        Route::get('admin/profile', [AbsensiController::class, 'admin_profile'])->name('admin.profile');
        Route::get('admin/profile/update/{uid}', [AbsensiController::class, 'admin_profile_update'])->name('admin.profile.update');
        Route::put('admin/profile/update/{uid}', [AbsensiController::class, 'admin_profile_update_proccess'])->name('admin.profile.update_proccess');
        // Status

        Route::put('/pulang-status/{uid}', [AbsensiController::class, 'pulangStatus'])->name('pulangStatus');
        
    });
    Route::middleware(['role:guru'])->group(function(){
        // Guru
            Route::get('/guru', [AbsensiController::class, 'guru_index'])->name('guru.index');
            Route::get('/guru/data', [AbsensiController::class, 'guru_data'])->name('guru.data');
            Route::get('/guru/rekap', [AbsensiController::class, 'guru_rekap'])->name('guru.rekap');
            Route::get('/guru/tidak_hadir', [AbsensiController::class, 'guru_tidak_hadir'])->name('guru.tidak_hadir');
            Route::get('/guru/rekap-detail/{username}', [AbsensiController::class, 'guru_rekap_detail'])->name('guru.rekap.detail');
            Route::get('guru/profile', [AbsensiController::class, 'guru_profile'])->name('guru.profile');
            Route::get('guru/profile/update/{uid}', [AbsensiController::class, 'guru_profile_update'])->name('guru.profile.update');
            Route::put('guru/profile/update/{uid}', [AbsensiController::class, 'guru_profile_update_proccess'])->name('guru.profile.update_proccess');
    });
    Route::middleware(['role:siswa'])->group(function(){
        // Siswa
            Route::get('/layout', [SiswaController::class, 'siswa_layout'])->name('siswa.layout');
            Route::get('/user', [SiswaController::class, 'siswa_index'])->name('siswa.index');   
            Route::get('/user/rekap', [SiswaController::class, 'siswa_rekap'])->name('siswa.rekap');
            Route::get('/profile', [SiswaController::class, 'siswa_profile'])->name('siswa.profile');
            Route::get('/profile/update/{uid}', [SiswaController::class, 'profile_update'])->name('profile.update');
            Route::put('/profile/update/{uid}', [SiswaController::class, 'profile_update_proccess'])->name('profile.update_proccess');
    });
    // Search (bisa diakses oleh semua role yang login)
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::put('/update-status/{uid}', [AbsensiController::class, 'updateStatus'])->name('updateStatus');

    // Route data realtime
    //Admin dan Guru
    // Route::get('/absensi-hadir/realtime', function () {
    //     $data = App\Models\AbsensiHadir::latest()->take(10)->get(); // Bisa disesuaikan
    //     return response()->json($data);
    // });
    // Route::get('/admin/rekap/realtime', function () {
    //     $data = \App\Models\AbsensiHadir::whereDate('hari_tanggal', \Carbon\Carbon::today())
    //         ->orderBy('username', 'asc')
    //         ->get();
    
    //     return response()->json($data);
    // });
    // Route::get('/guru/rekap/realtime', function () {
    //     $data = \App\Models\AbsensiHadir::whereDate('hari_tanggal', \Carbon\Carbon::today())
    //         ->orderBy('username', 'asc')
    //         ->get();
    
    //     return response()->json($data);
    // });
    // // Siswa
    // Route::get('/user/absensi/realtime', function () {
    //     $absensi = \App\Models\AbsensiHadir::where('username', Auth::user()->username)->first();
    //     return response()->json($absensi);
    // });
});
