<?php

namespace App\Http\Controllers;

use App\Models\AbsensiHadir;
use App\Models\AbsensiTidakHadir;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{

    // Admin
    function index(Request $request)
    {
        $query = $request->query('query');
        $date = Carbon::now()->format('Y-m-d');
        $time = Carbon::now()->locale('id')->translatedFormat('l');

        $users = $query ? User::where('username', 'like', "%$query%")->paginate(10) : User::paginate(10);
        $absensihadir = $query ? AbsensiHadir::where('username', 'like', "%$query%")->paginate(10) : AbsensiHadir::paginate(10);
        $absensitidakhadir = $query ? AbsensiTidakHadir::where('username', 'like', "%$query%")->paginate(10) : AbsensiTidakHadir::paginate(10);

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
                ->get();
        } else {
            // Jika tidak ada pencarian, tampilkan semua data
            $data = User::all();
        }
        
        return view('absensi.admin2.input', compact('title', 'data'));
    }
    function input_layout()
    {
        $title = 'input';
        $role = Role::all();
        return view('absensi.admin2.input_proses', compact('title', 'role'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'uid' => 'required|unique:users',
            'username' => 'required|unique:users',
            'jurusan' => 'required',
            'kelas' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'uid' => $request->uid,
            'username' => $request->username,
            'role_id' => $request->role,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->intended(route('admin.input'))->with('sukses', 'Data siswa berhasil disimpan!');
    }

    public function update(string $uid)
    {
        $data = User::where('uid', $uid)->first();
        $role = Role::all();
        return view('absensi.admin2.update', compact('data', 'role'));
    }
    public function update_process(Request $request, string $uid)
    {
        $request->validate([
            'username' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            'role' => 'required',
        ]);

        User::where('uid', $uid)->update([
            'username' => $request->username,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'role_id' => $request->role,
        ]);
        $user = User::where('uid', $uid)->first();
        return redirect()->intended(route('admin.input'))->with('sukses', 'Data dengan No. Card ' . $user->uid . ' berhasil diupdate!');
    }

    public function delete(string $uid)
    {
        User::where('uid', $uid)->delete();
        return redirect()->intended(route('admin.input'))->with('sukses', 'Data berhasil dihapus!');
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

        // Query dasar
        $dataQuery = AbsensiHadir::query();

        // Jika ada query pencarian
        if ($query) {
            $dataQuery->where('username', 'like', "%$query%");
        }

        // Terapkan sorting
        $dataQuery->orderBy('username', $sort);

        // Ambil data dengan pagination
        $data = $dataQuery->paginate(10);

        return view('absensi.admin2.rekap', compact('title', 'data', 'query', 'sort'));
    }
    function scan()
    {
        $title = 'scan';
        return view('absensi.admin2.scan', compact('title'));
    }

    public function scan_input(Request $request)
    {
        $request->validate([
            'card_id' => 'required|string'
        ]);
    
        // Cari user berdasarkan card_id
        $user = User::where('no_card', $request->card_id)->first();
    
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Kartu tidak terdaftar'], 404);
        }
    
        // Catat absensi
        AbsensiHadir::create([
            'user_id' => $user->id,
            'tanggal' => Carbon::now()->toDateString(),
            'waktu_masuk' => Carbon::now()->toTimeString(),
            'status' => 'Hadir',
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Absensi berhasil dicatat',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'timestamp' => Carbon::now()->toDateTimeString()
            ]
        ]);
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


    function surat()
    {
        $title = 'surat';
        return view('absensi.admin2.surat', compact('title'));
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
        return view('absensi.user3.profile', compact('data'));
    }
}
