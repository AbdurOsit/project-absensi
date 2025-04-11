@extends('absensi.user3.layout')
@section('user3')
    @if (session('sukses'))
        <div class="bg-green-500 text-white p-3 rounded">
            {{ session('sukses') }}
        </div>
    @endif
    <!-- Tugas,Praktek,Kegiatan Minggu Ini Section -->
    <div class="space-y-1">
        <h3 class="text-gray-900 dark:text-white text-2xl md:text-3xl font-bold mx-4 md:ml-12">Tugas Minggu Ini</h3>
        {{-- Tugas Section --}}
        <div class="bg-gray-300 dark:bg-zinc-800 p-3 md:p-6 rounded-2xl flex space-x-2 md:space-x-1 mx-4 md:ml-28">
            <!-- Previous button -->
            <button onclick="moveCarousel('left')" class="text-purple-600 dark:text-purple-400 p-1 md:p-2 rounded-lg hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="md:w-20 md:h-20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6"/>
                </svg>
            </button>
            
            <div id="carousel" class="flex space-x-2 md:space-x-4 flex-1 justify-center carousel-container" data-tugas='@json($tugas)'>
                
            </div>
            
            <!-- Next button -->
            <button onclick="moveCarousel('right')" class="text-purple-600 dark:text-purple-400 p-1 md:p-2 rounded-lg hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="md:w-20 md:h-20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"/>
                </svg>
            </button>
        </div>
        
    </div>

    <div class="flex flex-col md:flex-row p-2 md:p-3">
        <!-- Praktek Section -->
        <div class="space-y-1 mt-4 mx-4 md:ml-10 w-full md:w-auto">
            <h3 class="text-gray-900 dark:text-white text-lg md:text-xl font-bold">Praktek Minggu Ini</h3>
            <div class="bg-gray-300 dark:bg-zinc-800 rounded-lg w-full md:w-52">
                <div class="space-y-2 h-auto">
                    <div class="space-y-2 h-auto pb-2">
                        @if ($kegiatan->isEmpty())
                        <p class="text-center dark:text-white text-lg font-bold flex justify-center items-center">Tidak ada Praktek</p>
                        @else
                        @foreach ($praktek as $item)
                        <li class="flex items-center gap-3 bg-white dark:bg-gray-700 p-3 rounded-lg shadow-sm mx-2 my-2">
                            <button class="w-6 h-6 md:w-8 md:h-8 flex items-center justify-center rounded-full">
                                <svg class="bg-blue-500 w-8 h-auto md:w-10 rounded-full text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                                </svg>                            
                            </button>
                            <span class="text-gray-900 dark:text-white text-sm md:font-medium">{{ $item->hari }} - {{ $item->praktek ?? 'Tidak Ada Praktek' }}</span>
                        </li>
                        @endforeach
                        <div class="flex justify-center text-center">
                        {{ $praktek->links('pagination::tailwind') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Kegiatan Section -->
        <div class="space-y-1 mt-4 mx-4 md:ml-5 w-full md:w-auto">
            <h3 class="text-gray-900 dark:text-white text-lg md:text-xl font-bold">Kegiatan Minggu Ini</h3>
            <div class="bg-gray-300 dark:bg-zinc-800 rounded-lg w-full md:w-48">
                <div class="space-y-2 h-auto pb-2">
                    @if ($kegiatan->isEmpty())
                    <p class="text-center dark:text-white text-lg font-bold flex justify-center items-center">Tidak ada kegiatan</p>
                    @else
                    @foreach ($kegiatan as $item)
                    <li class="flex items-center gap-3 bg-white dark:bg-gray-700 p-3 md:p-4 rounded-lg shadow-sm mx-2 my-2">
                        <button class="w-6 h-6 md:w-8 md:h-8 flex items-center justify-center rounded-full">
                            <svg class="bg-blue-500 w-8 h-auto md:w-10 rounded-full text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                            </svg>                            
                        </button>
                        <span class="text-gray-900 dark:text-white text-sm md:font-medium">{{ $item->hari }} - {{ $item->kegiatan ?? 'Tidak Ada Kegiatan' }}</span>
                    </li>
                    @endforeach
                    <div class="flex justify-center text-center">
                        {{ $kegiatan->links('pagination::tailwind') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Absensi Section -->
        <div class="bg-gray-100 dark:bg-zinc-800 rounded-xl mt-6 mx-4 md:ml-5 p-3 md:p-4 shadow-md w-full md:w-auto">
            <h3 class="text-gray-900 dark:text-white text-xl md:text-2xl font-bold mb-2 md:mb-4">Absensi Hari Ini</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-gray-900 dark:text-white border-collapse text-sm md:text-base">
                    <thead>
                        <tr class="bg-blue-500 text-white text-left">
                            <th class="py-2 md:py-3 px-2 md:px-4 rounded-tl-lg">No. Card</th>
                            <th class="py-2 md:py-3 px-2 md:px-4">Nama</th>
                            <th class="py-2 md:py-3 px-2 md:px-4">Status</th>
                            <th class="py-2 md:py-3 px-2 md:px-4">Waktu Kedatangan</th>
                            <th class="py-2 md:py-3 px-2 md:px-4 rounded-tr-lg">Waktu Pulang</th>
                        </tr>
                    </thead>
                    <tbody id="absensiRealtimeBody">
                        @if($absensi)
                        <tr class="bg-white dark:bg-gray-700 text-center shadow-sm">
                            <td class="py-2 md:py-3 px-1 md:px-4">{{ $absensi->uid }}</td>
                            <td class="py-2 md:py-3 px-1 md:px-4">{{ $absensi->username }}</td>
                            <td class="py-2 md:py-3 px-1 md:px-4">{{ $absensi->status }}</td>
                            <td class="py-2 md:py-3 px-1 md:px-4">{{ $absensi->waktu_datang }}</td>
                            <td class="py-2 md:py-3 px-1 md:px-4">{{ $absensi->waktu_pulang }}</td>
                        </tr>
                        @else
                        <tr class="bg-white dark:bg-gray-700 text-center shadow-sm">
                            <td colspan="5" class="py-2 md:py-3 px-2 md:px-4 text-gray-500 italic">Belum ada absensi</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script>
        const tasks = @json($tugas);
const colors = ['bg-blue-500', 'bg-green-500', 'bg-yellow-500', 'bg-red-500', 'bg-purple-500', 'bg-pink-500', 'bg-indigo-500'];

let currentIndex = 0;

function generateTaskSlides() {
    const carousel = document.getElementById('carousel');
    carousel.innerHTML = '';

    // Ambil 3 tugas dari posisi sekarang tanpa loop
    const endIndex = Math.min(currentIndex + 3, tasks.length);
    for (let i = currentIndex; i < endIndex; i++) {
        const task = tasks[i];
        const card = document.createElement('div');
        card.className = `task-card w-24 h-16 md:w-48 md:h-24 ${colors[i % colors.length]} rounded-lg shadow-lg transform transition-all duration-300 cursor-pointer flex items-center justify-center`;
        card.innerHTML = `<span class="text-white text-xs md:text-lg font-bold p-1 md:p-0 text-center">${task.judul}</span>`;
        carousel.appendChild(card);
    }
}

function moveCarousel(direction) {
    if (tasks.length <= 3) return;

    if (direction === 'right' && currentIndex + 3 < tasks.length) {
        currentIndex++;
    } else if (direction === 'left' && currentIndex > 0) {
        currentIndex--;
    }

    generateTaskSlides();
}

generateTaskSlides();
function fetchAbsensiUser() {
    fetch('/user/absensi/realtime')
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById('absensiRealtimeBody');
            tbody.innerHTML = '';

            if (data) {
                const row = `
                    <tr class="bg-white dark:bg-gray-700 text-center shadow-sm">
                        <td class="py-2 md:py-3 px-1 md:px-4">${data.uid}</td>
                        <td class="py-2 md:py-3 px-1 md:px-4">${data.username}</td>
                        <td class="py-2 md:py-3 px-1 md:px-4">${data.status}</td>
                        <td class="py-2 md:py-3 px-1 md:px-4">${data.waktu_datang ?? '-'}</td>
                        <td class="py-2 md:py-3 px-1 md:px-4">${data.waktu_pulang ?? '-'}</td>
                    </tr>
                `;
                tbody.innerHTML = row;
            } else {
                tbody.innerHTML = `
                    <tr class="bg-white dark:bg-gray-700 text-center shadow-sm">
                        <td colspan="5" class="py-2 md:py-3 px-2 md:px-4 text-gray-500 italic">Belum ada absensi</td>
                    </tr>
                `;
            }
        });
}

// Jalankan setiap 3 detik
setInterval(fetchAbsensiUser, 3000);
    </script>
@endsection