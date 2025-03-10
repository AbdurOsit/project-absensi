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

        // Ambil hari Senin minggu ini
        $startDate = Carbon::now()->startOfWeek(); // Senin minggu ini
        $endDate = $startDate->copy()->addDays(4); // Jumat minggu ini
    
        // Ambil data dari tabel berdasarkan tanggal
        // $jadwal = DB::table('tugas ')->whereBetween('tanggal', [$startDate, $endDate])->get();
        $tugas = DB::table('tugas')
        ->whereBetween('tanggal', [$startDate, $endDate])
        ->whereNotNull('tugas')
        ->select('tanggal', 'tugas as judul', 'hari') // Pastikan 'tugas' dikembalikan sebagai 'judul'
        ->get();

        // Ambil data praktek dengan pagination
        $praktek = DB::table('tugas')
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->whereNotNull('praktek')
            ->select('tanggal', 'praktek', 'hari')
            ->paginate(3);

        // Ambil data kegiatan dengan pagination
        $kegiatan = DB::table('tugas')
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->whereNotNull('kegiatan')
            ->select('tanggal', 'kegiatan', 'hari')
            ->paginate(3);

        $absensi = AbsensiHadir::where('username',Auth::user()->username)->first();

        return view('absensi.user3.index', compact('data', 'tugas', 'praktek', 'kegiatan','absensi'));
    }
    public function siswa_rekap()
    {
        $data = Auth::user();
        return view('absensi.user3.rekap', compact('data'));
    }

    public function profile_update(string $uid){
        $data = User::where('uid', $uid)->first();
        // $role = Role::all();
        return view('absensi.user3.profile_update', compact('data'));
    }

    public function profile_update_proccess(Request $request,string $uid){
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

        return redirect()->route('siswa.rekap')->with('sukses', 'Profil berhasil diupdate!');
    }
}
