@extends('absensi.user3.layout')
@section('user3')
    <h1 class="dark:text-white text-xl md:text-2xl font-semibold mb-4 md:mb-6">
        Hi, {{ $data->username }}
    </h1>

    @if (session('sukses'))
        <div class="bg-green-500 text-white p-2 rounded">
            {{ session('sukses') }}
        </div>
    @endif
    <!-- Profile Card -->
    <div class="bg-gray-300 dark:bg-zinc-800 rounded-xl p-3 md:p-4 mb-4 md:mb-5">
        <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
            <!-- Profile Image -->
            <div class="flex justify-center mb-3 md:mb-0">
                @if (Auth::user()->image)
                    <img src="{{ asset('image/' . Auth::user()->image) }}" alt="Profile" class="w-28 h-28 md:w-44 md:h-44 rounded-full" />
                @else
                    <img src="https://tse2.mm.bing.net/th?id=OIP.bunDCjSjB6yognR-L7SpQgHaHa&pid=Api&P=0&h=220" alt="Profile"
                        class="w-28 h-28 md:w-44 md:h-44 rounded-full" />
                @endif
            </div>

            <!-- Profile Info -->
            <div class="dark:text-white space-y-2 md:space-y-4 text-center md:text-left md:pl-6 text-lg md:text-2xl font-serif">
                <p>Nama: {{ $data->username }}</p>
                <p>Kelas: {{ $data->kelas }}</p>
                <p>Jurusan: {{ $data->jurusan }}</p>
            </div>
        </div>

        {{-- Update Profil Icon --}}
        {{-- <div class="flex justify-end mt-2">
            <div class="bg-purple-600 w-8 h-8 md:w-10 md:h-10 rounded-full flex justify-center items-center">
                <a href="{{ route('profile.update', $data->uid) }}">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-gray-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                    </svg>
                </a>
            </div>
        </div> --}}
    </div>

    <!-- Attendance Recap Section -->
    <div class="space-y-3 md:space-y-4">
        <h2 class="dark:text-white text-lg md:text-xl font-semibold">Rekap Absensi</h2>

        <!-- Filter Controls -->
        <div class="flex flex-col space-y-3 md:space-y-0 md:flex-row md:space-x-4">
            <!-- First row of filters for mobile -->
            <div class="flex justify-between space-x-2">
                <div class="flex items-center space-x-2">
                    <span class="dark:text-white text-sm md:text-base">Bulan:</span>
                    <select
                        class="bg-gray-300 dark:bg-zinc-800 dark:text-white border border-gray-700 rounded-md py-1 px-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500"
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

                <div class="flex items-center space-x-2">
                    <span class="dark:text-white text-sm md:text-base">Kelas:</span>
                    <select
                        class="bg-gray-300 dark:bg-zinc-800 dark:text-white border border-gray-700 rounded-md py-1 px-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500"
                        title="2">
                        <option>12</option>
                        <option>11</option>
                        <option>10</option>
                    </select>
                </div>
            </div>

            <!-- Second row of status counters for mobile -->
            <div class="grid grid-cols-3 gap-2">
                <div class="flex items-center justify-between md:justify-start">
                    <span class="dark:text-white text-sm md:text-base">Sakit:</span>
                    <span class="flex justify-center items-center w-8 h-8 md:w-10 md:h-10 dark:bg-gray-600 bg-gray-300 ml-1 md:ml-3 text-white font-bold rounded-xl">{{ $sakit }}</span>
                </div>

                <div class="flex items-center justify-between md:justify-start">
                    <span class="dark:text-white text-sm md:text-base">Izin:</span>
                    <span class="flex justify-center items-center w-8 h-8 md:w-10 md:h-10 dark:bg-gray-600 bg-gray-300 ml-1 md:ml-3 text-white font-bold rounded-xl">{{ $izin }}</span>
                </div>

                <div class="flex items-center justify-between md:justify-start">
                    <span class="dark:text-white text-sm md:text-base">Alpha:</span>
                    <span class="flex justify-center items-center w-8 h-8 md:w-10 md:h-10 dark:bg-gray-600 bg-gray-300 ml-1 md:ml-3 text-white font-bold rounded-xl">{{ $alpha }}</span>
                </div>
            </div>
        </div>

        <!-- Attendance Data Container -->
        <div class="bg-gray-300 dark:bg-zinc-800 rounded-xl p-2 min-h-[120px] overflow-x-auto">
            <table class="w-full border border-gray-900 dark:text-white">
                <thead>
                    <tr class="bg-gray-300 dark:bg-zinc-800 text-left">
                        <th class="border border-gray-500 px-2 md:px-4 py-1 md:py-2 text-sm md:text-base">Tanggal</th>
                        <th class="border border-gray-500 px-2 md:px-4 py-1 md:py-2 text-sm md:text-base">
                            Hari
                        </th>
                        <th class="border border-gray-500 px-2 md:px-4 py-1 md:py-2 text-sm md:text-base">Keterangan</th>
                        <th class="border border-gray-500 px-2 md:px-4 py-1 md:py-2 text-sm md:text-base">Foto Surat</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($absensi->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center py-2 text-sm md:text-base">Tidak ada data absensi tidak hadir.</td>
                        </tr>
                    @else
                        @foreach ($absensi as $item)
                            <tr class="bg-gray-300 dark:bg-zinc-800">
                                <td class="border border-gray-500 px-2 md:px-4 py-1 md:py-2 text-sm md:text-base">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                <td class="border border-gray-500 px-2 md:px-4 py-1 md:py-2 text-sm md:text-base">{{ $item->hari }}</td>
                                <td class="border border-gray-500 px-2 md:px-4 py-1 md:py-2 text-sm md:text-base">{{ $item->alasan }}</td>
                                <td class="border border-gray-500 px-2 md:px-4 py-1 md:py-2 text-sm md:text-base">
                                    <img src=" {{ asset('image/' . $item->surat) }}" alt="surat"
                                    class="w-24 h-24 object-cover rounded-md mb-2">    
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="flex justify-end text-center text-sm">
                {{ $absensi->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
@endsection