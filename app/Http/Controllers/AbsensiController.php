<?php

namespace App\Http\Controllers;

use App\Models\AbsensiHadir;
use App\Models\AbsensiTidakHadir;
use App\Models\PulangEksklusif;
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
    public function index(Request $request)
    {
        // Set zona waktu ke Asia/Jakarta
        date_default_timezone_set('Asia/Jakarta');
    
        $query = $request->query('query');
        $day = Carbon::now('Asia/Jakarta')->format('d-m-Y'); // format: YYYY-MM-DD
        $today = Carbon::now('Asia/Jakarta')->toDatestring(); // format: YYYY-MM-DD
        $hari_ini = Carbon::today('Asia/Jakarta');
        $time = Carbon::now('Asia/Jakarta')->locale('id')->translatedFormat('l');
    
        // Mengecek waktu saat ini
        $currentTime = Carbon::now('Asia/Jakarta');
        $cutoffTime = Carbon::createFromTimeString('15:00:00', 'Asia/Jakarta');
    
        // Jika status pending sampai atau lewat dari jam yang diatur
        if ($currentTime->greaterThan($cutoffTime)) {
            $pendingAbsensi = AbsensiHadir::where('status', false)
                ->whereDate('hari_tanggal', $today)
                ->get();
    
            foreach ($pendingAbsensi as $absen) {
                $sudahAda = AbsensiTidakHadir::where('username', $absen->username)
                ->whereDate('tanggal', $today)
                ->exists();
                
                // Masukkan data ke absensi Tidak hadir
                if (!$sudahAda) {
                    AbsensiTidakHadir::create([
                        'username'   => $absen->username,
                        'role_id'    => $absen->role_id,
                        'kelas'      => $absen->kelas,
                        'jurusan'    => $absen->jurusan,
                        'hari'       => $time,
                        'tanggal'    => $today,
                        'alasan'     => 'alpha',
                        'surat'      => null,
                        'created_at' => Carbon::now('Asia/Jakarta'),
                        'updated_at' => Carbon::now('Asia/Jakarta'),
                    ]);
                    // Hapus data dari AbsensiHadir
                    $absen->delete();
                }
            }
        }
    
        // Ambil data user berdasarkan pencarian
        $users = $query
            ? User::where('username', 'like', "%$query%")->paginate(3, ['*'], 'username')
            : User::with('role')->paginate(3, ['*'], 'username');
    
        // Ambil data absensi hadir untuk hari ini
        $absensihadir = $query
            ? AbsensiHadir::where('username', 'like', "%$query%")->whereDate('hari_tanggal', $today)->paginate(3, ['*'], 'absensihadir')
            : AbsensiHadir::whereDate('hari_tanggal', $today)->paginate(3, ['*'], 'absensihadir');
    
        // Ambil data absensi tidak hadir untuk hari ini
        $absensitidakhadir = $query
            ? AbsensiTidakHadir::where('username', 'like', "%$query%")->whereDate('tanggal', $today)->paginate(3)
            : AbsensiTidakHadir::whereDate('tanggal', $today)->paginate(3); 
    
        return view('absensi.admin2.index', [
            'users' => $users,
            'absensihadir' => $absensihadir,
            'tidakhadir' => $absensitidakhadir,
            'search_query' => $query,
            'day' => $day,
            'date' => $today,
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
            $data = User::with('role')->paginate(11);
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'jurusan' => 'required',
            'kelas' => 'required',
            'role' => 'required',
            'email' => 'nullable',
            'password' => 'nullable',
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
        return response()->json([
            'success' => true,
            'status' => $item->status,
        ]);
    }

    public function pulangStatus($uid){
        // Ambil data berdasarkan uid dari relasi user
        $pulang = PulangEksklusif::where('user_uid', $uid)->first();

        if ($pulang) {
            $pulang->status = !$pulang->status; // toggle status
            $pulang->save();

            return response()->json(['success' => true, 'new_status' => $pulang->status]);
        }

        return response()->json(['success' => false], 404);
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
            $data = User::where('role_id', 3)->with('role')->get();
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
            $dataQuery->where('username', 'like', "%$query%")->orWhere('kelas', 'like', "%$query%")->orWhere('jurusan', 'like', "%$query%")->orWhere('waktu_datang', 'like', "%$query%")->orWhere('waktu_pulang', 'like', "%$query%");
        }
    
        // Terapkan sorting
        $dataQuery->orderBy($sortColumn, $sort);
    
        // Ambil data dengan pagination
        Carbon::setLocale('id');
        $data = $dataQuery->where('hari_tanggal',Carbon::now()->translatedFormat('Y-m-d'))->paginate(10);
    
        return view('absensi.admin2.rekap', compact('title', 'data', 'query', 'sort', 'sortColumn'));
    }

    public function rekap_detail($username){
        $name = AbsensiHadir::where('username',$username)->first();
        $data = AbsensiTidakHadir::where('username', $username)->get();
        return view('absensi.admin2.rekap_detail', compact('data','name'));
    }

    // function waktu(Request $request)
    // {
    //     $title = 'waktu';
    //     $query = $request->query('query');
    //     $sort = $request->query('sort', 'asc'); // default sort asc
    //     Carbon::setLocale('id');
    //     // Query dasar
    //     $dataQuery = Waktu::query();
    //     $pulangQuery = PulangEksklusif::query();

    //     // Jika ada query pencarian
    //     if ($query) {
    //         $dataQuery->where('hari', 'like', "%$query%")
    //                   ->orWhere('jam_masuk','like', "%$query%")
    //                   ->orWhere('jam_pulang','like', "%$query%");
    //         $pulangQuery->where('hari', 'like', "%$query%")
    //                 ->orWhere('status','like', "%$query%")
    //                 ->orWhere('user_uid','like', "%$query%");
    //     }

    //     // Terapkan sorting
    //     $dataQuery->orderBy('hari', $sort);
    //     $pulangQuery->orderBy('hari', $sort);

    //     // Ambil data dengan pagination
    //     $data = $dataQuery->paginate(5);
    //     $pulang = $pulangQuery->paginate(5);

    //     return view('absensi.admin2.waktu', compact('title', 'data', 'query', 'sort', 'pulang'));
    // }

    function tidak_hadir(Request $request){
        $query = $request->input('query'); // ambil query dari input

        $data = DB::table('users as u')
            ->leftJoin('absensi_tidak_hadirs as a', 'u.username', '=', 'a.username')
            ->select(
                'u.id',
                'u.username',
                DB::raw("COUNT(CASE WHEN a.alasan = 'sakit' THEN 1 END) as jumlah_sakit"),
                DB::raw("COUNT(CASE WHEN a.alasan = 'izin' THEN 1 END) as jumlah_izin"),
                DB::raw("COUNT(CASE WHEN a.alasan = 'alpha' THEN 1 END) as jumlah_alpha"),
                DB::raw("COUNT(a.id) as total_tidak_hadir")
            )
            ->where('u.role_id', 3)
            ->when($query, function ($q) use ($query) {
                $q->where(function ($subquery) use ($query) {
                    $subquery->where('u.username', 'like', "%$query%")
                        ->orWhere('a.alasan', 'like', "%$query%");
                });
            })
            ->groupBy('u.id', 'u.username')
            ->get();

        return view('absensi.admin2.tidak_hadir', compact('data'));
    }

    function jadwal(Request $request){
        $query = $request->query('query');
        $tugas = $query ? DB::table('tugas')->where('hari', 'like', "%$query%")->orWhere('tanggal', 'like', "%$query%")->orWhere('tugas', 'like', "%$query%")->orWhere('deadline_hari', 'like', "%$query%")->orWhere('deadline_tanggal', 'like', "%$query%")->paginate(3, ['*'], 'tugas_page') : DB::table('tugas')->orderBy('id','desc')->paginate(3, ['*'], 'tugas_page');

        $praktek = $query ? DB::table('praktek')->where('hari', 'like', "%$query%")->orWhere('tanggal', 'like', "%$query%")->orWhere('praktek', 'like', "%$query%")->paginate(3, ['*'], 'praktek_page') : DB::table('praktek')->orderBy('id','desc')->paginate(3, ['*'], 'praktek_page');

        $kegiatan = $query ? DB::table('kegiatan')->where('hari', 'like', "%$query%")->orWhere('tanggal', 'like', "%$query%")->orWhere('kegiatan', 'like', "%$query%")->paginate(3, ['*'], 'kegiatan_page') : DB::table('kegiatan')->orderBy('id','desc')->paginate(3, ['*'], 'kegiatan_page');

        return view('absensi.admin2.jadwal',compact('tugas','praktek','kegiatan','query'));
    }

    function scan()
    {
        $title = 'scan';
        $data = AbsensiHadir::whereDate ('hari_tanggal',Carbon::today())->orderBy('updated_at','desc')->first();
        return view('absensi.admin2.scan', compact('title','data'));
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
        $user = $query
            ? User::where('username', 'like', "%$query%")->paginate(3, ['*'], 'username')
            : User::where('role_id',3)->paginate(11, ['*'], 'username');
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
            'role_id' => 3,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'alasan' => $request->alasan,
            'surat' => $suratName,
        ]);
        
        return redirect()->route('admin.surat')->with('sukses', 'Absen tidak hadir siswa berhasil disimpan!');
    }

    public function admin_profile()
    {
        $data = Auth::user();
        // $role = Role::all();
        return view('absensi.admin2.profile', compact('data'));
    }

    public function admin_profile_update(string $uid)
    {
        $data = Auth::user();
        // $role = Role::all();
        return view('absensi.admin2.profile_update', compact('data'));
    }

    public function admin_profile_update_proccess(Request $request, string $uid){
        $request->validate([
            'username' => 'required',
            'jurusan' => 'required',
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

         // Update username dan class
        $user->username = $request->username;
        $user->jurusan = $request->jurusan;

        // Update password jika ada input baru
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

            return redirect()->route('admin.profile')->with('sukses', 'Profil berhasil diupdate!');
    }

    // Guru
    function guru_index(Request $request)
    {
        // Set zona waktu ke Asia/Jakarta
        date_default_timezone_set('Asia/Jakarta');
    
        $query = $request->query('query');
        $day = Carbon::now('Asia/Jakarta')->format('d-m-Y'); // format: YYYY-MM-DD
        $today = Carbon::now('Asia/Jakarta')->toDatestring(); // format: YYYY-MM-DD
        $hari_ini = Carbon::today('Asia/Jakarta');
        $time = Carbon::now('Asia/Jakarta')->locale('id')->translatedFormat('l');
    
        // Mengecek waktu saat ini
        $currentTime = Carbon::now('Asia/Jakarta');
        $cutoffTime = Carbon::createFromTimeString('15:00:00', 'Asia/Jakarta');
    
        // Jika status pending sampai atau lewat dari jam yang diatur
        if ($currentTime->greaterThan($cutoffTime)) {
            $pendingAbsensi = AbsensiHadir::where('status', false)
                ->whereDate('hari_tanggal', $today)
                ->get();
    
            foreach ($pendingAbsensi as $absen) {
                $sudahAda = AbsensiTidakHadir::where('username', $absen->username)
                ->whereDate('tanggal', $today)
                ->exists();
                
                // Masukkan data ke absensi Tidak hadir
                if (!$sudahAda) {
                    AbsensiTidakHadir::create([
                        'username'   => $absen->username,
                        'role_id'    => $absen->role_id,
                        'kelas'      => $absen->kelas,
                        'jurusan'    => $absen->jurusan,
                        'hari'       => $time,
                        'tanggal'    => $today,
                        'alasan'     => 'alpha',
                        'surat'      => null,
                        'created_at' => Carbon::now('Asia/Jakarta'),
                        'updated_at' => Carbon::now('Asia/Jakarta'),
                    ]);
                    // Hapus data dari AbsensiHadir
                    $absen->delete();
                }
            }
        }
    
        // Ambil data user berdasarkan pencarian
        $users = $query
            ? User::where('username', 'like', "%$query%")->paginate(3, ['*'], 'username')
            : User::with('role')->paginate(3, ['*'], 'username');
    
        // Ambil data absensi hadir untuk hari ini
        $absensihadir = $query
            ? AbsensiHadir::where('username', 'like', "%$query%")->whereDate('hari_tanggal', $today)->paginate(3, ['*'], 'absensihadir')
            : AbsensiHadir::whereDate('hari_tanggal', $today)->paginate(3, ['*'], 'absensihadir');
    
        // Ambil data absensi tidak hadir untuk hari ini
        $absensitidakhadir = $query
            ? AbsensiTidakHadir::where('username', 'like', "%$query%")->whereDate('tanggal', $today)->paginate(3)
            : AbsensiTidakHadir::whereDate('tanggal', $today)->paginate(3); 
    
        return view('absensi.guru.index', [
            'users' => $users,
            'absensihadir' => $absensihadir,
            'tidakhadir' => $absensitidakhadir,
            'search_query' => $query,
            'day' => $day,
            'date' => $today,
            'time' => $time,
        ]);
    }
    function guru_data(Request $request)
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

        return view('absensi.guru.data', compact('title', 'data', 'query'));
    }
    function guru_rekap(Request $request)
    {
        $title = 'rekap';
        $query = $request->query('query');
        $sort = $request->query('sort', 'asc'); // default sort asc
        $sortColumn = $request->query('sortColumn', 'username'); // default sort by username
    
        // Query dasar
        $dataQuery = AbsensiHadir::query();
    
        // Jika ada query pencarian
        if ($query) {
            $dataQuery->where('username', 'like', "%$query%")->orWhere('kelas', 'like', "%$query%")->orWhere('jurusan', 'like', "%$query%")->orWhere('waktu_datang', 'like', "%$query%")->orWhere('waktu_pulang', 'like', "%$query%");
        }
    
        // Terapkan sorting
        $dataQuery->orderBy($sortColumn, $sort);
    
        // Ambil data dengan pagination
        Carbon::setLocale('id');
        $data = $dataQuery->where('hari_tanggal',Carbon::now()->translatedFormat('Y-m-d'))->paginate(10);
    
        return view('absensi.guru.rekap', compact('title', 'data', 'query', 'sort', 'sortColumn'));
    }
    function guru_tidak_hadir(Request $request){
        $query = $request->input('query'); // ambil query dari input

        $data = DB::table('users as u')
        ->leftJoin('absensi_tidak_hadirs as a', 'u.username', '=', 'a.username')
        ->select(
            'u.id',
            'u.username',
            DB::raw("COUNT(CASE WHEN a.alasan = 'sakit' THEN 1 END) as jumlah_sakit"),
            DB::raw("COUNT(CASE WHEN a.alasan = 'izin' THEN 1 END) as jumlah_izin"),
            DB::raw("COUNT(CASE WHEN a.alasan = 'alpha' THEN 1 END) as jumlah_alpha"),
            DB::raw("COUNT(a.id) as total_tidak_hadir")
        )
        ->where('u.role_id', 3)
        ->when($query, function ($q) use ($query) {
            $q->where(function ($subquery) use ($query) {
                $subquery->where('u.username', 'like', "%$query%")
                    ->orWhere('a.alasan', 'like', "%$query%");
            });
        })
        ->groupBy('u.id', 'u.username')
        ->get();

        return view('absensi.guru.tidak_hadir', compact('data'));
    }

    public function guru_rekap_detail($username){
        // $name = AbsensiHadir::where('username',$username)->first();
        $data = AbsensiTidakHadir::where('username', $username)->get();
        return view('absensi.guru.rekap_detail', compact('data'));
    }

    public function guru_profile()
    {
        $data = Auth::user();
        // $role = Role::all();
        return view('absensi.guru.profile', compact('data'));
    }

    public function guru_profile_update(string $uid)
    {
        $data = Auth::user();
        // $role = Role::all();
        return view('absensi.guru.profile_update', compact('data'));
    }

    public function guru_profile_update_proccess(Request $request, string $uid){
        $request->validate([
            'username' => 'required',
            'jurusan' => 'required',
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

         // Update username dan class
        $user->username = $request->username;
        $user->jurusan = $request->jurusan;

        // Update password jika ada input baru
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

            return redirect()->route('guru.profile')->with('sukses', 'Profil berhasil diupdate!');
    }

}
