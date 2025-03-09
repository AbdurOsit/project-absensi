@extends('absensi.user3.layout')
@section('user3')
    @if (session('sukses'))
        <div class="bg-green-500 text-white p-3 rounded">
            {{ session('sukses') }}
        </div>
    @endif
    <!-- Tugas,Praktek,Kegiatan Minggu Ini Section -->
    <div class="space-y-1">
        <h3 class="text-gray-900 dark:text-white text-3xl font-bold ml-12">Tugas Minggu Ini</h3>
        {{-- Tugas Section --}}
        <div class="bg-gray-300 dark:bg-zinc-800 p-6 rounded-2xl flex space-x-6 ml-28">
            <!-- Previous button -->
            <button onclick="moveCarousel('left')" class="text-purple-600 dark:text-purple-400 p-2 rounded-lg hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6"/>
                </svg>
            </button>
            
            <div id="carousel" class="flex space-x-4 flex-1 justify-center carousel-container" data-tugas='@json($tugas)'>
                
            </div>
            
            <!-- Next button -->
            <button onclick="moveCarousel('right')" class="text-purple-600 dark:text-purple-400 p-2 rounded-lg hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"/>
                </svg>
            </button>
        </div>
        
    </div>

    <div class="flex p-3">
        <!-- Praktek Section -->
        <div class="space-y-1 mt-4 ml-10">
            <h3 class="text-gray-900 dark:text-white text-xl font-bold">Praktek Minggu Ini</h3>
            <div class="bg-gray-300 dark:bg-zinc-800 rounded-lg w-52">
                <div class="space-y-2 h-auto">
                    <div class="space-y-2 h-auto pb-2">
                        @foreach ($praktek as $item)
                            <div class="flex items-center text-black dark:text-white ml-2 pt-3">
                                <span class="w-2 h-2 bg-black dark:bg-white rounded-full mr-2"></span>
                                <span>{{ $item->hari }} - {{ $item->praktek ?? 'Tidak Ada Praktek' }}</span>
                            </div>
                        @endforeach
                        <div class="flex justify-center text-center">
                        {{ $praktek->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kegiatan Section -->
        <div class="space-y-1 mt-4 ml-5">
            <h3 class="text-gray-900 dark:text-white text-xl font-bold">Kegiatan Minggu Ini</h3>
            <div class="bg-gray-300 dark:bg-zinc-800 rounded-lg w-52">
                <div class="space-y-2 h-auto pb-2">
                    @foreach ($kegiatan as $item)
                    <div class="flex items-center text-black dark:text-white ml-2 pt-3">
                        <span class="w-2 h-2 bg-black dark:bg-white rounded-full mr-2"></span>
                        <span>{{ $item->hari }} - {{ $item->kegiatan ?? 'Tidak Ada Kegiatan' }}</span>
                    </div>
                    @endforeach
                    <div class="flex justify-center text-center">
                        {{ $kegiatan->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Absensi Section -->
        <div class="bg-gray-300 w-full dark:bg-zinc-800 rounded-lg mt-4 ml-5">
            <h3 class="text-black dark:text-white font-medium mb-4 ml-2 mt-2" >Absensi Hari Ini</h3>
            <table class="w-full text-black dark:text-white">
                <thead>
                    <tr class="text-left">
                        <th class="pb-2 pl-2 pr-3">No.Card</th>
                        <th class="pb-2 pl-14">Nama</th>
                        <th class="pb-2 pl-14">Status</th>
                        <th class="pb-2 pl-14">Waktu Kedatangan</th>
                        <th class="pb-2 pl-14 pr-10">Waktu Pulang</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td class="pb-2 pl-2 pr-3">{{ $absensi->uid }}</td>
                        <td class="pb-2 pl-14">{{ $absensi->username }}</td>
                        <td class="pb-2 pl-14">{{ $absensi->status }}</td>
                        <td class="pb-2 pl-14">{{ $absensi->waktu_datang }}</td>
                        <td class="pb-2 pl-14 pr-10">{{ $absensi->waktu_pulang }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="/resourrces/views/absensi/user3/layout"></script>
@endsection