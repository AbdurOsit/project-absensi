<?php

namespace App\Http\Controllers;

use App\Models\AbsensiHadir;
use App\Models\AbsensiTidakHadir;
use App\Models\Role;
use App\Models\User;
use App\Models\Waktu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function siswa_layout()
    {
        $data = Auth::user();
        return view('absensi.user3.layout', compact('data'));
    }

    public function siswa_index()
    {
        $data = Auth::user();
        $now = Carbon::now();
        // Ambil hari Senin minggu ini
        $startDate = Carbon::now()->startOfWeek(); // Senin minggu ini
        $endDate = $startDate->copy()->addDays(4); // Jumat minggu ini

        // Tambahkan batas H+1 berdasarkan deadline_tanggal
        $maxDeadline = DB::table('tugas')->max('deadline_tanggal'); // Ambil deadline terakhir
        $adjustedEndDate = $maxDeadline ? Carbon::parse($maxDeadline)->addDay() : $endDate;

        // Ambil data dari tabel berdasarkan tanggal
        $tugas = DB::table('tugas')
            ->whereBetween('tanggal', [$startDate, $adjustedEndDate]) // Perpanjang hingga H+1 dari deadline
            ->whereNotNull('tugas')
            ->select('tanggal', 'tugas as judul', 'hari','deadline_tanggal','deadline_hari')
            ->get();

        // Ambil data praktek dengan pagination
        $praktek = DB::table('praktek')
            ->whereBetween('tanggal', [$startDate, $adjustedEndDate])
            ->whereNotNull('praktek')
            ->select('tanggal', 'praktek', 'hari')
            ->paginate(3, ['*'], 'praktek');

        // Ambil data kegiatan dengan pagination
        $kegiatanStart = Carbon::now()->startOfWeek(); // Senin
        $kegiatanEnd = Carbon::now()->endOfWeek(); // Minggu

        $kegiatan = DB::table('kegiatan')
            ->whereBetween('tanggal', [$kegiatanStart, $kegiatanEnd])
            ->whereNotNull('kegiatan')
            ->select('tanggal', 'kegiatan', 'hari')
            ->paginate(3, ['*'], 'kegiatan');

        $absensi = AbsensiHadir::where('username', Auth::user()->username)
        ->whereDate('created_at', Carbon::today())
        ->first();

        return view('absensi.user3.index', compact('data', 'tugas', 'praktek', 'kegiatan', 'absensi','now'));
    }

    public function siswa_rekap()
    {
        $data = Auth::user();

        $absensi = AbsensiTidakHadir::where('username', $data->username)
            ->orderBy('tanggal', 'asc')
            ->paginate(1);
        // Menghitung jumlah alasan sakit, izin, dan alpha
        $sakit = AbsensiTidakHadir::where('username', $data->username)->where('alasan', 'sakit')->count();
        $izin = AbsensiTidakHadir::where('username', $data->username)->where('alasan', 'izin')->count();
        $alpha = AbsensiTidakHadir::where('username', $data->username)->where('alasan', 'alpha')->count();

        // Menampilkan hasil (contoh dalam Blade)
        return view('absensi.user3.rekap', compact('absensi','data' ,'sakit', 'izin', 'alpha'));
    }

    public function siswa_profile(){
        $data = Auth::user();
        return view('absensi.user3.profile',compact('data'));
    }

    public function profile_update(string $uid)
    {
        $data = User::where('uid', $uid)->first();
        // $role = Role::all();
        return view('absensi.user3.profile_update', compact('data'));
    }

    public function profile_update_proccess(Request $request, string $uid)
    {
        $request->validate([
            'password' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::where('uid', $uid)->first();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();

            // Hapus foto lama jika ada
            if ($user->image && File::exists(public_path('image/' . $user->image))) {
                File::delete(public_path('image/' . $user->image));
            }

            // Simpan foto baru
            $file->move(public_path('image'), $imageName);
            $user->image = $imageName;
        }

        // Update password jika ada input baru
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('siswa.profile')->with('sukses', 'Profil berhasil diupdate!');
    }
}
