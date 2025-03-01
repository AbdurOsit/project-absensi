@extends('absensi.guru.layout')
@section('guru')
<div class="p-6">
    <!-- Header Controls -->
    <div class="flex items-center gap-4 mb-6">
        <!-- Search Box -->
        <div class="relative ">
            <input type="text" placeholder="Cari siswa" class="border border-black dark:border-none rounded-xl dark:text-white dark:bg-gray-800 px-3 py-2 w-48 text-sm focus:outline-none">
            <button
                class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 dark:text-white hover:text-gray-400 border border-none">
                ✕
            </button>
        </div>

        <!-- Dropdown -->
        <select class="rounded px-7 py-2 text-sm flex focus:outline-none dark:bg-gray-800 dark:text-white rounded-xl">
            <option>Nama Siswa A-Z</option>
            <option>Nama Siswa Z-A</option>
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
                    <th class="px-4 py-3 text-sm font-normal border border-black dark:border-white">Absen</th>
                    <th class="px-4 py-3 text-sm font-normal border border-black dark:border-white">Nama</th>
                    <th class="px-4 py-3 text-sm font-normal border border-black dark:border-white">Waktu Keterlambatan</th>
                    <th class="px-4 py-3 text-sm font-normal border border-black dark:border-white">Waktu Pulang</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <tr class="dark:text-white">
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">1</td>
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">01</td>
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">Gilbert Hidaya</td>
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">10.00</td>
                    <td class="px-4 py-3 text-sm font-normal border border-black dark:border-white">11.00</td>
                </tr>
            </tbody>
        </table>
    </div>    
@endsection