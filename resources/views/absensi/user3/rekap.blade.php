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
                    <img src="{{ asset('image/' . Auth::user()->image) }}" alt="Profile"
                        class="w-28 h-28 md:w-44 md:h-44 rounded-full" />
                @else
                    <img src="https://tse2.mm.bing.net/th?id=OIP.bunDCjSjB6yognR-L7SpQgHaHa&pid=Api&P=0&h=220" alt="Profile"
                        class="w-28 h-28 md:w-44 md:h-44 rounded-full" />
                @endif
            </div>

            <!-- Profile Info -->
            <div
                class="dark:text-white space-y-2 md:space-y-4 text-center md:text-left md:pl-6 text-lg md:text-2xl font-serif">
                <p>Nama: {{ $data->username }}</p>
                <p>Kelas: {{ $data->kelas }}</p>
                <p>Jurusan: {{ $data->jurusan }}</p>
            </div>
        </div>


    </div>

    <!-- Attendance Recap Section -->
    <div class="space-y-3 md:space-y-4">
        <h2 class="dark:text-white text-lg md:text-xl font-semibold">Rekap Absensi</h2>

        <!-- Filter Controls -->
        <div class="flex flex-col space-y-3 md:space-y-0 md:flex-row md:space-x-4">


            <!-- Second row of status counters for mobile -->
            <div class="grid grid-cols-3 gap-2">
                <div class="flex items-center justify-between md:justify-start">
                    <span class="dark:text-white text-sm md:text-base">Sakit:</span>
                    <span
                        class="flex justify-center items-center w-8 h-8 md:w-10 md:h-10 dark:bg-gray-600 bg-gray-300 ml-1 md:ml-3 text-white font-bold rounded-xl">{{ $sakit }}</span>
                </div>

                <div class="flex items-center justify-between md:justify-start">
                    <span class="dark:text-white text-sm md:text-base">Izin:</span>
                    <span
                        class="flex justify-center items-center w-8 h-8 md:w-10 md:h-10 dark:bg-gray-600 bg-gray-300 ml-1 md:ml-3 text-white font-bold rounded-xl">{{ $izin }}</span>
                </div>

                <div class="flex items-center justify-between md:justify-start">
                    <span class="dark:text-white text-sm md:text-base">Alpha:</span>
                    <span
                        class="flex justify-center items-center w-8 h-8 md:w-10 md:h-10 dark:bg-gray-600 bg-gray-300 ml-1 md:ml-3 text-white font-bold rounded-xl">{{ $alpha }}</span>
                </div>
            </div>
        </div>

        <!-- Attendance Data Container -->
        <div class="bg-gray-300 dark:bg-zinc-800 rounded-xl p-2 min-h-[120px] overflow-x-auto">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th class="border border-slate-800 dark:border-white">Tanggal</th>
                        <th class="border border-slate-800 dark:border-white">Hari</th>
                        <th class="border border-slate-800 dark:border-white">Keterangan</th>
                        <th class="border border-slate-800 dark:border-white">Foto Surat</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($absensi->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center py-2 text-sm md:text-base">Tidak ada data absensi tidak
                                hadir.</td>
                        </tr>
                    @else
                        @foreach ($absensi as $item)
                            <tr class="text-center">
                                <td class="border border-slate-800 dark:border-white">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('d F Y') }}
                                </td>
                                <td class="border border-slate-800 dark:border-white">
                                    {{ $item->hari }}
                                </td>
                                <td class="border border-slate-800 dark:border-white">
                                    {{ $item->alasan }}
                                </td>
                                <td class="border border-slate-800 dark:border-white">
                                    <img src="{{ asset('image/' . $item->surat) }}" alt="surat"
                                        class="w-24 h-24 object-cover rounded-md mb-2 border border-slate-800 dark:border-white">
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
