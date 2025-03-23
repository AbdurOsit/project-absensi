<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class JadwalController extends Controller
{
    
    // Tugas
    function tugas_input(){
        Carbon::setLocale('id');
        $hari = DB::table('tugas')->where('hari'); // Mengambil Hari di database
        $tanggal = Carbon::now()->format('Y-m-d'); // Format tanggal YYYY-MM-DD
        return view('absensi.admin2.tugas.input',compact('hari','tanggal'));
    }
    function tugas_create(Request $request){
        Session::flash('hari',$request->hari);
        Session::flash('tanggal',$request->tanggal);
        Session::flash('tugas',$request->tugas);
        Session::flash('deadline_hari',$request->deadline_hari);
        Session::flash('deadline_tanggal',$request->deadline_tanggal);
        $request->validate([
            'hari' => 'required',
            'tanggal' => 'required',
            'tugas' => 'nullable|string',
            'deadline_hari' => 'required',
            'deadline_tanggal' => 'required',
        ]);
        $data = [
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'tugas' => $request->tugas,
            'deadline_hari' => $request->deadline_hari,
            'deadline_tanggal' => $request->deadline_tanggal,
        ];

        DB::table('tugas')->insert($data);
        return redirect()->to('admin/jadwal')->with('sukses','Tugas berhasil ditambahkan');
    }
    function tugas_update($id){
        $data = DB::table('praktek')->where('id',$id)->first();
        return view('absensi.admin2.tugas.update',compact('data'));
    }
    function tugas_update_proccess(Request $request,$id){
        $request->validate([
            'hari' => 'required',
            'tanggal' => 'required',
            'tugas' => 'nullable|string',
            'deadline_hari' => 'required',
            'deadline_tanggal' => 'required',
        ]);
        $data = [
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'tugas' => $request->tugas,
            'deadline_hari' => $request->deadline_hari,
            'deadline_tanggal' => $request->deadline_tanggal,
        ];

        DB::table('tugas')->where('id',$id)->update($data);
        return redirect()->to('admin/jadwal')->with('sukses','tugas berhasil diubah');
    }
    function tugas_delete($id){
        DB::table('tugas')->where('id',$id)->delete();
        return redirect()->to('/admin/jadwal')->with('sukses','jadwal berhasil dihapus');
    }

    //Praktek
    function praktek_input(){
        Carbon::setLocale('id');
        $hari = DB::table('praktek')->where('hari');
        // Mengambil nama hari di database
        $tanggal = Carbon::now()->format('Y-m-d'); // Format tanggal YYYY-MM-DD

        return view('absensi.admin2.praktik.input',compact('hari','tanggal'));
    }
    function praktek_create(Request $request){
        Session::flash('hari',$request->hari);
        Session::flash('tanggal',$request->tanggal);
        Session::flash('praktek',$request->tugas);
        $request->validate([
            'hari' => 'required',
            'tanggal' => 'required',
            'praktek' => 'nullable|string',
        ]);
        $data = [
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'praktek' => $request->praktek,
        ];

        DB::table('praktek')->insert($data);
        return redirect()->to('admin/jadwal')->with('sukses','praktek berhasil ditambahkan');
    }
    function praktek_update($id){
        $data = DB::table('praktek')->where('id',$id)->first();
        return view('absensi.admin2.praktik.update',compact('data'));
    }
    function praktek_update_proccess(Request $request,$id){
        $request->validate([
            'hari' => 'required',
            'tanggal' => 'required',
            'praktek' => 'nullable|string',
        ]);
        $data = [
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'praktek' => $request->praktek,
        ];

        DB::table('praktek')->where('id',$id)->update($data);
        return redirect()->to('admin/jadwal')->with('sukses','praktek berhasil diubah');
    }
    function praktek_delete($id){
        DB::table('praktek')->where('id',$id)->delete();
        return redirect()->to('/admin/jadwal')->with('sukses','Praktek berhasil dihapus');
    }

    // Kegiatan
    function kegiatan_input(){
        Carbon::setLocale('id');
        $hari = DB::table('kegiatan')->where('hari');
        // Mengambil nama hari di database
        $tanggal = Carbon::now()->format('Y-m-d'); // Format tanggal YYYY-MM-DD

        return view('absensi.admin2.kegiatan.input',compact('hari','tanggal'));
    }
    function kegiatan_create(Request $request){
        Session::flash('hari',$request->hari);
        Session::flash('tanggal',$request->tanggal);
        Session::flash('kegiatan',$request->tugas);
        $request->validate([
            'hari' => 'required',
            'tanggal' => 'required',
            'kegiatan' => 'nullable|string',
        ]);
        $data = [
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
        ];

        DB::table('kegiatan')->insert($data);
        return redirect()->to('admin/jadwal')->with('sukses','kegiatan berhasil ditambahkan');
    }
    function kegiatan_update($id){
        $data = DB::table('kegiatan')->where('id',$id)->first();
        return view('absensi.admin2.kegiatan.update',compact('data'));
    }
    function kegiatan_update_proccess(Request $request,$id){
        $request->validate([
            'hari' => 'required',
            'tanggal' => 'required',
            'kegiatan' => 'nullable|string',
        ]);
        $data = [
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
        ];

        DB::table('kegiatan')->where('id',$id)->update($data);
        return redirect()->to('admin/jadwal')->with('sukses','kegiatan berhasil diubah');
    }
    function kegiatan_delete($id){
        DB::table('kegiatan')->where('id',$id)->delete();
        return redirect()->to('/admin/jadwal')->with('sukses','Kegiatan berhasil dihapus');
    }

}
