@extends('absensi.user3.layout')
@section('user3')
    <h1 class="dark:text-white text-2xl font-semibold mb-6">
        Hi, {{ $data->username }}
    </h1>

    @if (session('sukses'))
        <div class="bg-green-500 text-white p-2 rounded">
            {{ session('sukses') }}
        </div>
    @endif
    <!-- Profile Card -->
    <div class="bg-gray-300 dark:bg-zinc-800 rounded-xl p-4 mb-5">
        <div class="flex items-center space-x-4">
            <!-- Profile Image -->
            
            @if(Auth::user()->image)
            <img src="{{ asset('image/' . Auth::user()->image) }}" alt="Profile"
                class="w-44 h-44 rounded-full" />
            @else
            <img src="https://tse2.mm.bing.net/th?id=OIP.bunDCjSjB6yognR-L7SpQgHaHa&pid=Api&P=0&h=220" alt="Profile"
                class="w-44 h-44 rounded-full" />
            @endif

            <!-- Profile Info -->
            <div class="dark:text-white space-y-4 pl-6 text-2xl font-serif">
                <p>Nama: {{ $data->username }}</p>
                <p>Kelas: {{ $data->kelas }}</p>
                <p>Jurusan: {{ $data->jurusan }}</p>
            </div>
        </div>

        {{-- Update Profil Icon --}}
        <div class="flex justify-end">
            <div class="bg-purple-600 w-10 h-10 rounded-full flex justify-center items-center">

                <a href="{{ route("profile.update", $data->uid) }}">
                <svg class="w-6 h-6 text-gray-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"/>
                </svg>
                </a>
                
            </div>
        </div>
    </div>

    <!-- Attendance Recap Section -->
    <div class="space-y-4">
        <h2 class="dark:text-white text-xl font-semibold">Rekap Absensi</h2>

        <!-- Filter Controls -->
        <div class="flex space-x-4">
            <div class="flex items-center space-x-2">
                <span class="dark:text-white">Bulan:</span>
                <select
                    class="bg-gray-300 dark:bg-zinc-800 dark:text-white border border-gray-700 rounded-md py-1 px-3 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    title="1">
                    <option>Januari</option>
                    <option>Februari</option>
                    <option>Maret</option>
                    <option>April</option>
                    <option>Mei</option>
                    <option>Juni</option>
                    <option>Juli</option>
                    <option>Agustus</option>
                    <option>September</option>
                    <option>Oktober</option>
                    <option>November</option>
                    <option>Desember</option>
                </select>
            </div>

            <div class="flex space-x-4">
                <div class="flex items-center space-x-2">
                    <span class="dark:text-white">Kelas:</span>
                    <select
                        class="bg-gray-300 dark:bg-zinc-800 dark:text-white border border-gray-700 rounded-md py-1 px-3 focus:outline-none focus:ring-2 focus:ring-purple-500"
                        title="2">
                        <option>12</option>
                        <option>11</option>
                        <option>10</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Attendance Data Container -->
        <div class="bg-gray-300 dark:bg-zinc-800 rounded-xl p-2 min-h-[120px]">
            <table class="w-full border border-gray-900 dark:text-white">
                <thead>
                    <tr class="bg-gray-300 dark:bg-zinc-800 text-left">
                        <th class="border border-gray-500 px-4 py-2">Tanggal</th>
                        <th class="border border-gray-500 px-4 py-2">
                            Jam Kedatangan
                        </th>
                        <th class="border border-gray-500 px-4 py-2">Jam Pulang</th>
                        <th class="border border-gray-500 px-4 py-2">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-gray-300 dark:bg-zinc-800">
                        <td class="border border-gray-500 px-4 py-2"></td>
                        <td class="border border-gray-500 px-4 py-2"></td>
                        <td class="border border-gray-500 px-4 py-2"></td>
                        <td class="border border-gray-500 px-4 py-2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
