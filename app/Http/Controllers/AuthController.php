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
        Session::flash('username', $request->username);
        Session::flash('password', $request->password);
        // $credentials = $request->validate([
        $request->validate([
            'username' => 'required|',
            'password' => 'required'
        ], [
            'username.required' => 'username harus diisi',
            'password.required' => 'password harus diisi',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $remember = $request->has('remember'); // Ambil nilai Remember Me
        
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if ($remember) {
                // Set cookie dengan durasi 3 bulan (60 * 24 * 90 menit)
                Cookie::queue('remember_web', Auth::user()->username, 129600);
            }
            
            $user = Auth::user();
            if ($user->role->name == 'admin') {
                return redirect()->intended(route('admin.index'))->with('sukses', ' Hallo Admin ');
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

        return redirect()->route('login');
    }
}
