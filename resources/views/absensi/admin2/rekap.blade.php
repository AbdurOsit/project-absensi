@extends('absensi.admin2.layout')
@section('admin2')
<div class="p-6">
    <!-- Header Controls -->
    <div class="flex items-center gap-4 mb-6">
        <!-- Search Box -->
        <div class="relative ">
            <form ction="{{ route('search') }}" method="GET" >
                @csrf
                <input type="search" name="query" placeholder="Cari siswa" class="border border-black dark:border-none rounded-xl dark:text-white dark:bg-gray-800 px-3 py-2 w-48 text-sm focus:outline-none" value="{{ request('query') }}">
                <button
                    class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 dark:text-white hover:text-gray-400 border border-none">
                    ✕
                </button>
            </form>
        </div>

        <select onchange="window.location.href=this.value" class="rounded px-7 py-2 text-sm flex focus:outline-none dark:bg-gray-800 dark:text-white rounded-xl">
            <option value="{{ route('admin.rekap', ['sort' => 'asc', 'query' => $query ?? '']) }}" {{ request('sort') == 'asc' ? 'selected' : '' }}>
                Nama Siswa A-Z
            </option>
            <option value="{{ route('admin.rekap', ['sort' => 'desc', 'query' => $query ?? '']) }}" {{ request('sort') == 'desc' ? 'selected' : '' }}>
                Nama Siswa Z-A
            </option>
        </select>
        
        

        <!-- Add Student Button -->
        <button class="flex items-center gap-2 border border-none">
            <span class="w-6 h-6 bg-purple-500 rounded-full flex items-center justify-center text-white text-sm">
                +
            </span>
            <span class="text-sm dark:text-white">Tambah Siswa</span>
        </button>
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
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $item)    
                <tr class="dark:text-white">
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">{{ $no }}</td>
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->username }}</td>
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->kelas }}</td>
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->jurusan }}</td>
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->waktu_datang }}</td>
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->waktu_pulang }}</td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>    
@endsection