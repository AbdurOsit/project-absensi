<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AbsensiHadir;
use App\Models\AbsensiTidakHadir;
use App\Models\Waktu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        // Default ke index jika tidak ada
        $page = $request->input('page', 'admin.index');


        // Tentukan halaman yang sedang aktif
        // Langsung tentukan halaman yang sedang aktif
        switch ($page) {
            case 'admin.index':
                return $this->searchIndex($query);
            case 'admin.data':
                return $this->searchData($query);
            case 'admin.rekap':
                return $this->searchRekap($query);
            case 'admin.input':
                return $this->searchInput($query);
            case 'admin.jadwal':
                return $this->searchJadwal($query);
            case 'admin.waktu':
                return $this->searchWaktu($query);
            case 'admin.surat':
                return $this->searchSurat($query);
            case 'guru.index':
                return $this->guruIndex($query);
            case 'guru.data':
                return $this->guruData($query);
            case 'guru.rekap':
                return $this->guruRekap($query);
            default:
                return $this->searchIndex($query);
        }
    }

    private function searchIndex($query)
    {
        $users = User::where('username', 'like', "%$query%")->paginate(10);
        $absensihadir = AbsensiHadir::where('username', 'like', "%$query%")->paginate(10);
        $absensitidakhadir = AbsensiTidakHadir::where('username', 'like', "%$query%")->paginate(10);
        $date = Carbon::now()->format('Y-m-d');
        $time = Carbon::now()->locale('id')->translatedFormat('l');
        return redirect()->route('admin.index', ['query' => $query])->with([
            'users' => $users,
            'absensihadir' => $absensihadir,
            'tidakhadir' => $absensitidakhadir,
            'search_query' => $query,
            'date' => $date,
            'time' => $time,
        ]);
    }

    private function searchData($query)
    {
        $absensiHadirs = User::where('username', 'like', "%$query%")->paginate(10);
        return redirect()->route('admin.data', ['query' => $query])->with([
            'data' => $absensiHadirs,
            'search_query' => $query
        ]);
    }

    private function searchRekap($query)
    {
        $absensiHadirs = AbsensiHadir::where('username', 'like', "%$query%")->orWhere('kelas', 'like', "%$query%")->orWhere('jurusan', 'like', "%$query%")->orWhere('waktu_datang', 'like', "%$query%")->orWhere('waktu_pulang', 'like', "%$query%")->paginate(10);
        return redirect()->route('admin.rekap', ['query' => $query])->with([
            'data' => $absensiHadirs,
            'search_query' => $query
        ]);
    }

    private function searchInput($query)
    {
        // Sesuaikan dengan kebutuhan halaman input Anda
        $users = User::where('username', 'like', "%$query%")->paginate(10);
        return redirect()->route('admin.input', ['query' => $query])->with([
            'data' => $users,
            'search_query' => $query
        ]);
    }

    private function searchJadwal($query)
    {
        // Sesuaikan dengan kebutuhan halaman input Anda
        $tugas = DB::table('tugas')->where('hari', 'like', "%$query%")->orWhere('tanggal', 'like', "%$query%")->orWhere('tugas', 'like', "%$query%")->orWhere('deadline_hari', 'like', "%$query%")->orWhere('hari', 'like', "%$query%")->orWhere('deadline_tanggal', 'like', "%$query%")->paginate(5);
        $praktek = DB::table('praktek')->where('hari', 'like', "%$query%")->orWhere('tanggal', 'like', "%$query%")->orWhere('praktek', 'like', "%$query%")->paginate(5);
        $kegiatan = DB::table('kegiatan')->where('hari', 'like', "%$query%")->orWhere('tanggal', 'like', "%$query%")->orWhere('kegiatan', 'like', "%$query%")->paginate(5);

        return redirect()->route('admin.jadwal', ['query' => $query])->with([
            'tugas' => $tugas,
            'praktek' => $praktek,
            'kegiatan' => $kegiatan,
            'search_query' => $query
        ]);
    }

    private function searchWaktu($query)
    {
        // Sesuaikan dengan kebutuhan halaman input Anda
        $data = Waktu::where('hari', 'like', "%$query%")->orWhere('jam_masuk', 'like', "%$query%")->orWhere('jam_pulang', 'like', "%$query%")->paginate(10);
        return redirect()->route('admin.waktu', ['query' => $query])->with([
            'data' => $data,
            'search_query' => $query
        ]);
    }

    private function searchSurat($query)
    {
        // Sesuaikan dengan kebutuhan halaman input Anda
        $user = User::where('username', 'like', "%$query%")->paginate(10);
        return redirect()->route('admin.surat', ['query' => $query])->with([
            'user' => $user,
            'search_query' => $query
        ]);
    }
    private function guruIndex($query)
    {
        $users = User::where('username', 'like', "%$query%")->paginate(10);
        $absensihadir = AbsensiHadir::where('username', 'like', "%$query%")->paginate(10);
        $absensitidakhadir = AbsensiTidakHadir::where('username', 'like', "%$query%")->paginate(10);
        $date = Carbon::now()->format('Y-m-d');
        $time = Carbon::now()->locale('id')->translatedFormat('l');
        return redirect()->route('guru.index', ['query' => $query])->with([
            'users' => $users,
            'absensihadir' => $absensihadir,
            'tidakhadir' => $absensitidakhadir,
            'search_query' => $query,
            'date' => $date,
            'time' => $time,
        ]);
    }
    private function guruData($query)
    {
        $absensiHadirs = User::where('username', 'like', "%$query%")->paginate(10);
        return redirect()->route('guru.data', ['query' => $query])->with([
            'data' => $absensiHadirs,
            'search_query' => $query
        ]);
    }
    private function guruRekap($query)
    {
        $absensiHadirs = AbsensiHadir::where('username', 'like', "%$query%")->orWhere('hari_tanggal', 'like', "%$query%")->orWhere('kelas', 'like', "%$query%")->orWhere('jurusan', 'like', "%$query%")->orWhere('waktu_datang', 'like', "%$query%")->orWhere('waktu_pulang', 'like', "%$query%")->paginate(10);
        return redirect()->route('guru.rekap', ['query' => $query])->with([
            'data' => $absensiHadirs,
            'search_query' => $query
        ]);
    }
}
