<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AbsenUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/layout2', function(){
    return view('absensi.admin2.layout',[
        'title' => 'title'
    ]);
})->name('absensi.layout');
// Route::resource('absensi',AbsensiHadirController::class);

// Login And Register
Route::get('login',[AuthController::class,'login'])->name('login');
Route::post( 'login', [AuthController::class, 'auth'])->name('auth');
Route::post('logout',[AuthController::class,'logout'])->name('logout');

// Admin
Route::get('/admin',[AbsensiController::class,'index'])->name('admin.index');
// Admin CRUD
Route::get('/admin/input',[AbsensiController::class,'input'])->name('admin.input');
Route::get('/admin/input/layout', [AbsensiController::class, 'input_layout'])->name('admin.input_layout');
Route::post('/admin/input', [AbsensiController::class, 'store'])->name('admin.store');
Route::get('/admin/update/{uid}',[AbsensiController::class,'update'])->name('admin.update');
Route::put('/admin/update/{uid}',[AbsensiController::class,'update_process'])->name('admin.update_process');
Route::delete('/admin/delete/{uid}',[AbsensiController::class,'delete'])->name('admin.delete');
// End CRUD
// Admin Data
Route::get('/admin/data',[AbsensiController::class,'data'])->name('admin.data');
// End Data
// Admin Rekap
Route::get('/admin/rekap',[AbsensiController::class,'rekap'])->name('admin.rekap');
// End Rekap
// Admin Scan
Route::get('/admin/scan',[AbsensiController::class,'scan'])->name('admin.scan');
Route::get('/scan/input',[AbsensiController::class,'scan_input'])->name('scan.input');
Route::get('/get-latest-scan', [AbsensiController::class, 'getLatestScan'])->name('get.latest.scan');
// End Scan
Route::get('/admin/surat',[AbsensiController::class,'surat'])->name('admin.surat');
Route::put('/update-status/{uid}', [AbsensiController::class, 'updateStatus'])->name('updateStatus');
Route::get('/search', [SearchController::class,'search'])->name('search');

// Guru
Route::get('/guru',[AbsensiController::class,'guru_index'])->name('guru.index');
Route::get('/guru/data',[AbsensiController::class,'guru_data'])->name('guru.data');
Route::get('/guru/rekap',[AbsensiController::class,'guru_rekap'])->name('guru.rekap');

// Siswa
Route::get('/user/layout',[AbsensiController::class,'siswa_layout'])->name('siswa.layout');
Route::get('/user',[AbsensiController::class,'siswa_index'])->name('siswa.index');
Route::get('/user/rekap',[AbsensiController::class,'siswa_rekap'])->name('siswa.rekap');

// Route::get('/user2', function(){
//     $data = AbsensiHadir::all();
//     return view('absensi.user3.index',compact('data'));
// });
Route::get('/user2/profile', function(){
    return view('absensi.user3.profile');
});