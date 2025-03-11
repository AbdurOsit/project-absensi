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
                        <li class="flex items-center gap-3 bg-white dark:bg-gray-700 p-3 rounded-lg shadow-sm">
                            <button class="w-8 h-8 flex items-center justify-center rounded-full">
                                <svg class="bg-blue-500 w-10 h-auto rounded-full text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                                  </svg>                            
                            </button>
                            <span class="text-gray-900 dark:text-white font-medium">{{ $item->hari }} - {{ $item->praktek ?? 'Tidak Ada Praktek' }}</span>
                        </li>
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
                    <li class="flex items-center gap-3 bg-white dark:bg-gray-700 p-3 rounded-lg shadow-sm">
                        <button class="w-8 h-8 flex items-center justify-center rounded-full">
                            <svg class="bg-blue-500 w-10 h-auto rounded-full text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                              </svg>                            
                        </button>
                        <span class="text-gray-900 dark:text-white font-medium">{{ $item->hari }} - {{ $item->kegiatan ?? 'Tidak Ada Kegiatan' }}</span>
                    </li>
                    @endforeach
                    <div class="flex justify-center text-center">
                        {{ $kegiatan->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Absensi Section -->
        <!-- Absensi Section -->
        <div class="bg-gray-100 dark:bg-zinc-800 rounded-xl mt-6 ml-5 p-4 shadow-md">
            <h3 class="text-gray-900 dark:text-white text-2xl font-bold mb-4">Absensi Hari Ini</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-gray-900 dark:text-white border-collapse">
                    <thead>
                        <tr class="bg-blue-500 text-white text-left">
                            <th class="py-3 px-4 rounded-tl-lg">No. Card</th>
                            <th class="py-3 px-4">Nama</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4">Waktu Kedatangan</th>
                            <th class="py-3 px-4 rounded-tr-lg">Waktu Pulang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white dark:bg-gray-700 text-center shadow-sm">
                            <td class="py-3 px-4">{{ $absensi->uid }}</td>
                            <td class="py-3 px-4">{{ $absensi->username }}</td>
                            <td class="py-3 px-4">{{ $absensi->status }}</td>
                            <td class="py-3 px-4">{{ $absensi->waktu_datang }}</td>
                            <td class="py-3 px-4">{{ $absensi->waktu_pulang }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script>
        // Ambil data tugas dari Laravel dan konversi ke JSON
        const tasks = @json($tugas);

        // Warna untuk setiap tugas
        const colors = ['bg-blue-500', 'bg-green-500', 'bg-yellow-500', 'bg-red-500', 'bg-purple-500', 'bg-pink-500', 'bg-indigo-500'];

        let currentIndex = 0; // Mulai dari tugas pertama

        function generateTaskSlides() {
            const carousel = document.getElementById('carousel');
            carousel.innerHTML = ''; // Bersihkan isi carousel sebelum mengisi ulang

            // Pastikan selalu 3 tugas ditampilkan
            for (let i = 0; i < 3; i++) {
                const taskIndex = (currentIndex + i) % tasks.length; // Loop jika sudah mencapai akhir
                const task = tasks[taskIndex];

                const card = document.createElement('div');
                card.className = `task-card w-40 h-20 md:w-48 md:h-24 ${colors[taskIndex % colors.length]} rounded-lg shadow-lg transform transition-all duration-300 cursor-pointer flex items-center justify-center`;
                card.innerHTML = `<span class="text-white text-lg font-bold">${task.judul}</span>`;

                carousel.appendChild(card);
            }
        }

        function moveCarousel(direction) {
            if (tasks.length <= 3) return; // Tidak perlu geser jika tugas kurang dari atau sama dengan 3
        
            if (direction === 'right') {
                currentIndex = (currentIndex + 1) % tasks.length;
            } else {
                currentIndex = (currentIndex - 1 + tasks.length) % tasks.length;
            }
        
            generateTaskSlides();
        }
        
        // Inisialisasi carousel
        generateTaskSlides();
    </script>
@endsection