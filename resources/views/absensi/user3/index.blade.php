@extends('absensi.user3.layout')
@section('user3')
    <!-- Tugas Minggu Ini Section -->
    <div class="space-y-6">
        @if (session('sukses'))
                <div class="bg-green-500 text-white p-3 rounded">
                    {{ session('sukses') }}
                </div>
            @endif
        <h3 class="text-gray-900 dark:text-white text-3xl font-bold ml-12">Tugas Minggu Ini</h3>
        <div class="bg-gray-300 dark:bg-zinc-800 p-6 rounded-2xl flex space-x-6 ml-28">
            <!-- Previous button -->
            <button onclick="moveCarousel('left')" class="text-purple-600 dark:text-purple-400 p-2 rounded-lg hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" title="5">
                    <path d="m15 18-6-6 6-6"/>
                </svg>
            </button>
            
            <div id="carousel" class="flex space-x-4 flex-1 justify-center carousel-container">
                <div
                    class="task-card w-40 h-20 md:w-48 md:h-24 bg-blue-500 rounded-lg shadow-lg transform transition-all duration-300 cursor-pointer flex items-center justify-center">
                    <span class="text-white text-lg font-bold">Tugas 1</span>
                </div>
                <div
                    class="task-card w-44 h-24 md:w-56 md:h-32 bg-green-500 rounded-lg shadow-lg transform transition-all duration-300 cursor-pointer active flex items-center justify-center">
                    <span class="text-white text-lg font-bold">Tugas 2</span>
                </div>
                <div
                    class="task-card w-40 h-20 md:w-48 md:h-24 bg-yellow-500 rounded-lg shadow-lg transform transition-all duration-300 cursor-pointer flex items-center justify-center">
                    <span class="text-white text-lg font-bold">Tugas 3</span>
                </div>
            </div>
            
            <!-- Next button -->
            <button onclick="moveCarousel('right')" class="text-purple-600 dark:text-purple-400 p-2 rounded-lg hover:bg-gray-700" title="7">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" title="8">
                    <path d="m9 18 6-6-6-6"/>
                </svg>
            </button>
        </div>
    </div>

    <div class="flex p-3">
        <!-- Jadwal Section -->
        <div class="space-y-1 mt-4 ml-28">
            <h3 class="text-gray-900 dark:text-white text-xl font-bold">Jadwal Minggu Ini</h3>
            <div class="bg-gray-300 dark:bg-zinc-800 rounded-lg w-52">
                <div class="space-y-2 h-32">
                    <div class="flex items-center text-black dark:text-white ml-2 pt-3">
                        <span class="w-2 h-2 bg-black dark:bg-white rounded-full mr-2"></span>
                        <span>Senin Praktek</span>
                    </div>
                    <div class="flex items-center text-black dark:text-white ml-2">
                        <span class="w-2 h-2 bg-black dark:bg-white rounded-full mr-2"></span>
                        <span>Jumat Jumat'an</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Absensi Section -->
        <div class="bg-gray-300 dark:bg-zinc-800 rounded-lg mt-4 ml-10">
            <h3 class="text-black dark:text-white font-medium mb-4 ml-2 mt-2" >Absensi Hari Ini</h3>
            <table class="w-full text-black dark:text-white">
                <thead>
                    <tr class="text-left">
                        <th class="pb-2 pl-2 pr-3">No.</th>
                        <th class="pb-2 pl-14">Nama</th>
                        <th class="pb-2 pl-14">Status</th>
                        <th class="pb-2 pl-14">Waktu Kedatangan</th>
                        <th class="pb-2 pl-14 pr-10">Waktu Pulang</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table rows will go here -->
                </tbody>
            </table>
        </div>
    </div>
    <script src="/resourrces/views/absensi/user3/layout"></script>
@endsection