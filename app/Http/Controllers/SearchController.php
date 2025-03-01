<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AbsensiHadir;
use App\Models\AbsensiTidakHadir;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        // Default ke index jika tidak ada
        $page = $request->input('page','admin.index');
        
        
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
        $absensiHadirs = User::where('username', 'like', "%$query%")->paginate(10);
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
}