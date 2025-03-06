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
        return view('absensi.user3.index', compact('data'));
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
