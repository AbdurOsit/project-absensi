@extends('absensi.admin2.layout')
@section('admin2')
<div class="p-6">
    <!-- Header Controls -->
    <div class="flex items-center gap-4 mb-6">
        <!-- Search Box -->
        <div class="relative ">
            <form action="{{ route('search') }}" method="GET">
                @csrf
                <input type="search" name="query" placeholder="Cari siswa" class="border border-black dark:border-none rounded-xl dark:text-white dark:bg-gray-800 px-3 py-2 w-48 text-sm focus:outline-none" value="{{ request('query') }}">
                <button class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 dark:text-white hover:text-gray-400 border border-none">✕</button>
            </form>
        </div>

        <select onchange="window.location.href=this.value" class="rounded px-10 py-2 text-sm flex focus:outline-none dark:bg-gray-800 dark:text-white rounded-xl">
            <option value="{{ route('admin.rekap', ['sortColumn' => 'username', 'sort' => 'asc', 'query' => $query ?? '']) }}" {{ request('sortColumn') == 'username' && request('sort') == 'asc' ? 'selected' : '' }}>Nama Siswa A-Z</option>
            <option value="{{ route('admin.rekap', ['sortColumn' => 'username', 'sort' => 'desc', 'query' => $query ?? '']) }}" {{ request('sortColumn') == 'username' && request('sort') == 'desc' ? 'selected' : '' }}>Nama Siswa Z-A</option>
            <option value="{{ route('admin.rekap', ['sortColumn' => 'waktu_datang', 'sort' => 'asc', 'query' => $query ?? '']) }}" {{ request('sortColumn') == 'waktu_datang' && request('sort') == 'asc' ? 'selected' : '' }}>Waktu Datang Paling Awal</option>
            <option value="{{ route('admin.rekap', ['sortColumn' => 'waktu_datang', 'sort' => 'desc', 'query' => $query ?? '']) }}" {{ request('sortColumn') == 'waktu_datang' && request('sort') == 'desc' ? 'selected' : '' }}>Waktu Datang Paling Telat</option>
            <option value="{{ route('admin.rekap', ['sortColumn' => 'waktu_pulang', 'sort' => 'asc', 'query' => $query ?? '']) }}" {{ request('sortColumn') == 'waktu_pulang' && request('sort') == 'asc' ? 'selected' : '' }}>Waktu Pulang Terlama</option>
            <option value="{{ route('admin.rekap', ['sortColumn' => 'waktu_pulang', 'sort' => 'desc', 'query' => $query ?? '']) }}" {{ request('sortColumn') == 'waktu_pulang' && request('sort') == 'desc' ? 'selected' : '' }}>Waktu Pulang Terbaru</option>
        </select>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full border border-black dark:border-white">
            <thead>
                <tr class="dark:text-white">
                    <th class="px-4 py-3 text-sm font-normal border border-black dark:border-white">No</th>
                    <th class="px-4 py-3 text-sm font-normal border border-black dark:border-white">Username</th>
                    <th class="px-4 py-3 text-sm font-normal border border-black dark:border-white">Kelas</th>
                    <th class="px-4 py-3 text-sm font-normal border border-black dark:border-white">Jurusan</th>
                    <th class="px-4 py-3 text-sm font-normal border border-black dark:border-white">Waktu Datang</th>
                    <th class="px-4 py-3 text-sm font-normal border border-black dark:border-white">Waktu Pulang</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @php $no = 1; @endphp
                @foreach ($data as $item)
                <tr class="dark:text-white">
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">{{ $no }}</td>
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->username }}</td>
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->kelas }}</td>
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->jurusan }}</td>
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->waktu_datang }}</td>
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->waktu_pulang }}</td>
                </tr>
                @php $no++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>    
@endsection
