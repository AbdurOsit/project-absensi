<?php

namespace App\Http\Controllers;

use App\Models\AbsensiHadir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //Login
    function login()
    {
        return view('absensi.login.login');
    }
    
    function auth(Request $request)
    {
        // Simpan input username dan password ke session untuk sementara
        Session::flash('username', $request->username);
        Session::flash('password', $request->password);
        
        // Validasi form login
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'username harus diisi',
            'password.required' => 'password harus diisi',
        ]);
    
        // Mencari username berdasarkan input
        $user = User::where('username', $request->username)->first();
    
        if (!$user) {
            // Jika username tidak ada maka muncul pesan berikut
            return back()->withErrors(['username' => 'Username tidak ditemukan'])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            // Jika username ada tapi password yang di input salah maka muncul pesan berikut
            return back()->withErrors(['password' => 'Password salah'])->withInput();
        }

        // Siapkan data login
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        // Cek apakah Remember Me dicentang
        $remember = $request->has('remember');

        // Lakukan proses login
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate(); // Amankan session baru

            // Kalau Remember Me aktif, simpan cookie selama 3 bulan
            if ($remember) {
                Cookie::queue('remember_web', Auth::user()->username, 129600); // 90 hari
            }

            // Ambil data user yang login
            $user = Auth::user();

            // Arahkan ke halaman sesuai peran user
            if ($user->role->name == 'admin') {
                return redirect()->intended(route('admin.index'))->with('sukses', 'Hallo Admin');
            } elseif ($user->role->name == 'guru') {
                return redirect()->intended(route('guru.index'))->with('sukses', 'Guru ' . $user->username . ' berhasil login');
            } else {
                return redirect()->intended(route('siswa.index'))->with('sukses', 'Siswa ' . $user->username . ' berhasil login');
            }
        }
        return redirect()->back()->withErrors(['loginError' => 'Username atau password salah']);
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Cookie::queue(Cookie::forget('remember_web'));

        return redirect()->route('login')->with('sukses','Berhasil Logout');
    }
}
