<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class JadwalController extends Controller
{
    //
    // Tugas
    function tugas_input(){
        return view('absensi.admin2.tugas.input');
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
        $data = DB::table('tugas')->where('id',$id)->first();
        return view('absensi.admin2.jadwal_update',compact('data'));
    }
    function tugas_update_proccess(Request $request,$id){
        $request->validate([
            'hari' => 'required',
            'tanggal' => 'required',
            'tugas' => 'nullable|string',
            'praktek' => 'nullable|string',
            'kegiatan' => 'nullable|string',
            'deadline_hari' => 'required',
            'deadline_tanggal' => 'required',
        ]);
        $data = [
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'tugas' => $request->tugas,
            'praktek' => $request->praktek,
            'kegiatan' => $request->kegiatan,
            'deadline_hari' => $request->deadline_hari,
            'deadline_tanggal' => $request->deadline_tanggal,
        ];

        DB::table('tugas')->where('id',$id)->update($data);
        return redirect()->to('admin/jadwal')->with('sukses','jadwal berhasil ditambahkan');
    }
    function tugas_delete($id){
        DB::table('tugas')->where('id',$id)->delete();
        return redirect()->to('/admin/jadwal')->with('sukses','jadwal berhasil dihapus');
    }

}
