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
use Illuminate\Support\Facades\Session;

class AbsensiController extends Controller
{

    // Admin
    function index(Request $request)
    {
        $query = $request->query('query');
        $date = Carbon::now()->format('Y-m-d');
        $time = Carbon::now()->locale('id')->translatedFormat('l');

        $users = $query ? User::where('username', 'like', "%$query%")->paginate(3) : User::paginate(3);
        $absensihadir = $query ? AbsensiHadir::where('username', 'like', "%$query%")->paginate(3) : AbsensiHadir::paginate(3);
        $absensitidakhadir = $query ? AbsensiTidakHadir::where('username', 'like', "%$query%")->paginate(3) : AbsensiTidakHadir::paginate(3);

        return view('absensi.admin2.index', [
            'users' => $users,
            'absensihadir' => $absensihadir,
            'tidakhadir' => $absensitidakhadir,
            'search_query' => $query,
            'date' => $date,
            'time' => $time,
        ]);
    }
    function input(Request $request)
    {
        $title = 'input';
        $title = 'data';
        $query = $request->query('query');

        // Jika ada query pencarian
        if ($query) {
            $data = User::where('username', 'like', "%$query%")
                ->paginate(11);
        } else {
            // Jika tidak ada pencarian, tampilkan semua data
            $data = User::paginate(11);
        }
        
        return view('absensi.admin2.input', compact('title', 'data'));
    }
    function input_form()
    {
        $title = 'input';
        $role = Role::all();
        return view('absensi.admin2.input_form', compact('title', 'role'));
    }


    public function store(Request $request){
        $request->validate([
            'uid' => 'required|unique:users',
            'username' => 'required|unique:users',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'jurusan' => 'required',
            'kelas' => 'required',
            'role' => 'required',
            'email' => 'required|nullable',
            'password' => 'required',
        ]);
    
        $imageName = null;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('image'), $imageName);
        }
    
        User::create([
            'uid' => $request->uid,
            'username' => $request->username,
            'role_id' => $request->role,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'image' => $imageName, // Simpan nama file ke database
        ]);
    
        return redirect()->route('admin.input')->with('sukses', 'Data siswa berhasil disimpan!');
    }
    

    public function update($id){
        $data = User::where('id', $id)->first();
        $role = Role::all();
        return view('absensi.admin2.update', compact('data', 'role'));
    }
    public function update_process(Request $request, $id){
        $user = User::where('id', $id)->first();
        $request->validate([
            'uid' => 'required|unique:users,uid,' . $user->id . ',id', 
            'username' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            'role' => 'required',
            'password' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);


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

        $user->update([
            'uid' => $request->uid,
            'username' => $request->username,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'role_id' => $request->role,
            'image' => $user->image,
        ]);

        return redirect()->route('admin.input')->with('sukses', 'Data berhasil diupdate!');
    }

    public function delete(string $id){
        $user = User::where('id', $id)->first();

        // Hapus foto jika ada
        if ($user->image && File::exists(public_path('image/' . $user->image))) {
            File::delete(public_path('image/' . $user->image));
        }

        // Hapus user dari database
        $user->delete();

        return redirect()->route('admin.input')->with('sukses', 'Data berhasil dihapus!');
    }

    public function updateStatus(Request $request, $uid)
    {
        $item = AbsensiHadir::where('uid', $uid)->firstOrFail();
        $item->status = !$item->status; // Toggle status
        $item->save();

        return response()->json(['success' => true, 'status' => $item->status]);
    }

    public function data(Request $request)
    {
        $title = 'data';
        $query = $request->query('query');

        // Jika ada query pencarian
        if ($query) {
            $data = User::where('role_id', 3)
                ->where('username', 'like', "%$query%")
                ->get();
        } else {
            // Jika tidak ada pencarian, tampilkan semua data
            $data = User::where('role_id', 3)->get();
        }

        return view('absensi.admin2.data', compact('title', 'data', 'query'));
    }

    function rekap(Request $request)
    {
        $title = 'rekap';
        $query = $request->query('query');
        $sort = $request->query('sort', 'asc'); // default sort asc
        $sortColumn = $request->query('sortColumn', 'username'); // default sort by username
    
        // Query dasar
        $dataQuery = AbsensiHadir::query();
    
        // Jika ada query pencarian
        if ($query) {
            $dataQuery->where('username', 'like', "%$query%");
        }
    
        // Terapkan sorting
        $dataQuery->orderBy($sortColumn, $sort);
    
        // Ambil data dengan pagination
        $data = $dataQuery->paginate(10);
    
        return view('absensi.admin2.rekap', compact('title', 'data', 'query', 'sort', 'sortColumn'));
    }

    function waktu(Request $request)
    {
        $title = 'waktu';
        $query = $request->query('query');
        $sort = $request->query('sort', 'asc'); // default sort asc

        // Query dasar
        $dataQuery = Waktu::query();

        // Jika ada query pencarian
        if ($query) {
            $dataQuery->where('hari', 'like', "%$query%")
                      ->orWhere('jam_masuk','like', "%$query%")
                      ->orWhere('jam_pulang','like', "%$query%");
        }

        // Terapkan sorting
        $dataQuery->orderBy('hari', $sort);

        // Ambil data dengan pagination
        $data = $dataQuery->paginate(10);

        return view('absensi.admin2.waktu', compact('title', 'data', 'query', 'sort'));
    }

    function jadwal(Request $request){
        $query = $request->query('query');
        $data = $query ? DB::table('tugas')->where('hari', 'like', "%$query%")->orWhere('tanggal', 'like', "%$query%")->orWhere('tugas', 'like', "%$query%")->orWhere('praktek', 'like', "%$query%")->orWhere('kegiatan', 'like', "%$query%")->orWhere('deadline_hari', 'like', "%$query%")->orWhere('hari', 'like', "%$query%")->orWhere('deadline_tanggal', 'like', "%$query%")->paginate(5) : DB::table('tugas')->orderBy('id','desc')->paginate(5);
        return view('absensi.admin2.jadwal',compact('data'));
    }

    function jadwal_input(){
        return view('absensi.admin2.jadwal_input');
    }

    function jadwal_create(Request $request){
        Session::flash('hari',$request->hari);
        Session::flash('tanggal',$request->tanggal);
        Session::flash('tugas',$request->tugas);
        Session::flash('praktek',$request->praktek);
        Session::flash('kegiatan',$request->kegiatan);
        Session::flash('deadline_hari',$request->deadline_hari);
        Session::flash('deadline_tanggal',$request->deadline_tanggal);
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

        DB::table('tugas')->insert($data);
        return redirect()->to('admin/jadwal')->with('sukses','jadwal berhasil ditambahkan');
    }

    function jadwal_update($id){
        $data = DB::table('tugas')->where('id',$id)->first();
        return view('absensi.admin2.jadwal_update',compact('data'));
    }

    function jadwal_update_proccess(Request $request,$id){
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

    function jadwal_delete($id){
        DB::table('tugas')->where('id',$id)->delete();
        return redirect()->to('/admin/jadwal')->with('sukses','jadwal berhasil dihapus');
    }

    function scan()
    {
        $title = 'scan';
        return view('absensi.admin2.scan', compact('title'));
    }

    public function scan_input(Request $request)
    {
        // validasi
        $request->validate([
            'uid' => 'required|string'
        ]);

        // Cari user berdasarkan UID
        $user = User::where('uid', $request->uid)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Kartu tidak terdaftar'
            ], 404);
        }

        $today = Carbon::now()->toDateString();
        $currentTime = Carbon::now()->toTimeString();
        $dayName = Carbon::now()->format('l'); // Nama hari (Monday, Tuesday, etc.)

        // Ambil jadwal jam masuk dan jam pulang berdasarkan hari dan role_id user
        $waktu = Waktu::where('hari', $dayName)
            ->where('role_id', $user->role_id)
            ->first();

        if (!$waktu) {
            return response()->json([
                'success' => false,
                'message' => 'Jadwal tidak ditemukan untuk hari ini'
            ], 404);
        }

        // Cek apakah user sudah absen masuk hari ini
        $absensi = AbsensiHadir::where('uid', $user->uid)
            ->whereDate('hari_tanggal', $today)
            ->first();

        if (!$absensi) {
            // Scan pertama kali -> catat waktu datang
            AbsensiHadir::create([
                'uid' => $user->uid,
                'username' => $user->username,
                'role_id' => $user->role_id,
                'kelas' => $user->kelas,
                'jurusan' => $user->jurusan,
                'status' => 0,
                'hari_tanggal' => $today,
                'waktu_datang' => $currentTime,
                'waktu_pulang' => null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Absensi masuk berhasil dicatat',
                'user' => [
                    'uid' => $user->uid,
                    'username' => $user->username,
                    'waktu_datang' => $currentTime
                ]
            ]);
        } else {
            // Scan kedua kali -> cek apakah sudah waktunya pulang
            if ($currentTime < $waktu->jam_pulang) {
                return response()->json([
                    'success' => false,
                    'message' => 'Belum waktunya pulang'
                ], 400);
            }

            // Catat waktu pulang
            $absensi->update([
                'waktu_pulang' => $currentTime
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Absensi pulang berhasil dicatat',
                'user' => [
                    'uid' => $user->uid,
                    'username' => $user->username,
                    'waktu_pulang' => $currentTime
                ]
            ]);
        }
    }

    public function getLatestScan()
    {
        $latestAbsensi = AbsensiHadir::with('user')->latest()->first();

        if ($latestAbsensi) {
            return response()->json([
                'success' => true,
                'user' => $latestAbsensi->user
            ]);
        }

        return response()->json(['success' => false]);
    }


    function surat(Request $request)
    {
        $title = 'surat';
        $query = $request->query('query');
        $user = $query ? User::where('username', 'like', "%$query%")->paginate(3) : User::paginate(3);
        // $siswa = User::where('role_id',3)->paginate(11);
        return view('absensi.admin2.surat', compact('title','user'));
    }

    function surat_proccess(Request $request){
        $request->validate([
            'username' => 'required|exists:users,username', // Cek apakah username ada di tabel users
            'jurusan' => 'required',
            'kelas' => 'required',
            'tanggal' => 'required',
            'hari' => 'required',
            'alasan' => 'required',
            'surat' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'username' => 'Username tidak ada di database'
        ]);
        
        // Cek apakah username ada di tabel users
        // $userExists = User::where('username', $request->username)->exists();
        // if (!$userExists) {
        //     return redirect()->back()->withInput()->with('error', 'Username tidak ditemukan di sistem.');
        // }

        // Proses Upload surat
        $suratName = null;
        
        if ($request->hasFile('surat')) {
            $file = $request->file('surat');
            $suratName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('image'), $suratName);
        }
        
        
        
        // Simpan data ke AbsensiTidakHadir jika username valid
        AbsensiTidakHadir::create([
            'username' => $request->username,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'alasan' => $request->alasan,
            'surat' => $suratName,
        ]);
        
        return redirect()->route('admin.surat')->with('sukses', 'Absen tidak hadir siswa berhasil disimpan!');
    }

    // Guru
    function guru_index()
    {
        $title = 'index';
        $absensihadir = AbsensiHadir::all();
        $time = AbsensiHadir::where('hari_tanggal')->first();
        $date = Carbon::parse($time)->locale('id')->translatedFormat('l, d F Y');
        $tidakhadir = AbsensiTidakHadir::all();
        return view('absensi.guru.index', compact('title', 'absensihadir', 'date', 'time', 'tidakhadir'));
    }
    function guru_data()
    {
        $title = 'data';
        return view('absensi.guru.data', compact('title'));
    }
    function guru_rekap()
    {
        $title = 'rekap';
        return view('absensi.guru.rekap', compact('title'));
    }


}
