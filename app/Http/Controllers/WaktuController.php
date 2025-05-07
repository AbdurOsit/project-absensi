<?php

namespace App\Http\Controllers;

use App\Models\PulangEksklusif;
use App\Models\Waktu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WaktuController extends Controller
{
    public function index(Request $request)
{
    $query = $request->query('query');
    $date = Carbon::now()->format('Y-m-d');
    $time = Carbon::now()->locale('id')->translatedFormat('l');

    // Coba cari dulu di masing-masing model
    $waktuSearch = Waktu::where('hari', 'like', "%$query%")
        ->orWhere('jam_masuk', 'like', "%$query%")
        ->orWhere('jam_pulang', 'like', "%$query%")
        ->get();

    $pulangSearch = PulangEksklusif::where('hari', 'like', "%$query%")
        ->orWhere('user_uid', 'like', "%$query%")
        ->orWhereHas('user', function ($q) use ($query) {
            $q->where('username', 'like', "%$query%");
        })
        ->get();

    // Jika hasil kosong dan query ada, tampilkan default
    $waktu = ($query && $waktuSearch->isEmpty()) ? Waktu::all() : ($query ? $waktuSearch : Waktu::all());

    $pulang = ($query && $pulangSearch->isEmpty()) 
        ? PulangEksklusif::where('hari', $time)->get() 
        : ($query ? $pulangSearch : PulangEksklusif::where('hari', $time)->get());

    return view('absensi.admin2.waktu', compact('waktu','pulang','query','date','time'));
}


    public function create(Request $request){
        return view('absensi.admin2.waktu_create');
    }

    public function create_proccess(Request $request){
        Session::flash('hari',$request->hari);
        Session::flash('jam_masuk',$request->jam_masuk);
        Session::flash('jam_pulang',$request->jam_pulang);

        $request->validate([
            'hari' => 'required|string',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required'
        ]);

        Waktu::create([
            'hari' => $request->hari,
            'jam_masuk' => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang
        ]);
        return redirect()->intended(route('admin.waktu'))->with('sukses', 'Waktu Berhasil Disimpan');
    }

    public function update($id){
        $waktu = Waktu::findOrFail($id);
        return view('absensi.admin2.waktu_update',compact('waktu'));
    }

    public function update_proccess(Request $request, $id){
        Session::flash('hari',$request->hari);
        Session::flash('jam_masuk',$request->jam_masuk);
        Session::flash('jam_pulang',$request->jam_pulang);

        $request->validate([
            'hari' => 'required|string',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required'
        ]);

        Waktu::where('id',$id)->update([
            'hari' => $request->hari,
            'jam_masuk' => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang
        ]);
        return redirect()->intended(route('admin.waktu'))->with('sukses', 'Waktu Berhasil diupdate');
    }
    public function delete($id){
        Waktu::where('id', $id)->delete();
        return redirect()->intended(route('admin.waktu'))->with('sukses', 'Waktu berhasil dihapus!');
    }
}