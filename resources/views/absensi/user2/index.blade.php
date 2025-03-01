@extends('absensi.user2.layout')
@section('user2')
    <div class="transition-all duration-100 p-6">
            <!-- Tugas Section -->
            <div class="mb-8">
                <h2 class="text-xl font-bold mb-4">Tugas Minggu Ini</h2>
                <div class="relative" rounded-lg p-4" id="main-content">
                    <div class="flex justify-between items-center">
                        <!-- Left Arrow -->
                        <button onclick="moveCarousel('left')"
                            class="text-purple-600 z-10 hover:text-purple-400 transition-colors">
                            <i class="fas fa-chevron-left text-2xl"></i>
                        </button>
                        {{-- <button class="text-purple-500">
                            <i class="fas fa-chevron-left text-2xl"></i>
                        </button> --}}


                        <!-- Cards -->
                        {{-- <div class="flex space-x-4 flex-1 justify-center">
                            <div class="w-48 h-24 bg-blue-500 rounded-lg shadow-lg"></div>
                            <div class="w-48 h-24 bg-green-500 rounded-lg shadow-lg"></div>
                            <div class="w-48 h-24 bg-yellow-500 rounded-lg shadow-lg"></div>
                        </div> --}}
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

                        <!-- Right Arrow -->
                        <button onclick="moveCarousel('right')"
                            class="text-purple-500 z-10 hover:text-purple-400 transition-colors">
                            <i class="fas fa-chevron-right text-2xl"></i>
                        </button>
                        {{-- <button class="text-purple-500">
                            <i class="fas fa-chevron-right text-2xl"></i>
                        </button> --}}
                    </div>
                </div>
            </div>

            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Schedule Section -->
                <div class="rounded-lg" p-4" id="jadwal">
                    <h2 class="text-xl font-bold mb-4">Jadwal Minggu Ini</h2>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <span class="w-2 h-2 bg-white rounded-full mr-2"></span>
                            Senin Praktek
                        </li>
                        <li class="flex items-center">
                            <span class="w-2 h-2 bg-white rounded-full mr-2"></span>
                            Jumat Sehat
                        </li>
                    </ul>
                </div>

                <!-- Attendance Section -->
                <div class="  rounded-lg p-4" id="absen">
                    <h2 class="text-xl font-bold mb-4">Absensi Hari Ini</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left border-b border-gray-700">
                                    <th class="pb-2 pr-4">No</th>
                                    <th class="pb-2 pr-4">Absen</th>
                                    <th class="pb-2 pr-4">Nama</th>
                                    <th class="pb-2 pr-4">Waktu Kedatangan</th>
                                    <th class="pb-2">Waktu Pulang</th>
                                </tr>
                                @foreach ($data as $item)    
                                <tr class="text-left border-b border-gray-700">
                                    <td class="pb-2 pr-4">{{ $item->id }}</td>
                                    <td class="pb-2 pr-4">{{ $item->absen }}</td>
                                    <td class="pb-2 pr-4">{{ $item->nama }}</td>
                                    <td class="pb-2 pr-4">{{ $item->waktu_datang }}</td>
                                    <td class="pb-2">{{ $item->waktu_pulang }}</td>
                                </tr>
                                @endforeach
                            </thead>
                            <tbody>
                                <!-- Table rows will be added dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<script>
        const tasks = [
        { color: 'bg-blue-500', title: 'Tugas 1' },
        { color: 'bg-green-500', title: 'Tugas 2' },
        { color: 'bg-yellow-500', title: 'Tugas 3' }
    ];
    
    let currentIndex = 1; // Start with middle card active

    function moveCarousel(direction) {
        const carousel = document.getElementById('carousel');
        const cards = carousel.children;
        
        if (direction === 'right') {
            // Rotate tasks array for right movement
            const lastTask = tasks.pop();
            tasks.unshift(lastTask);
        } else {
            // Rotate tasks array for left movement
            const firstTask = tasks.shift();
            tasks.push(firstTask);
        }
        
        // Remove active class from all cards
        Array.from(cards).forEach(card => {
            card.classList.remove('active');
        });
        
        // Add active class to middle card
        cards[1].classList.add('active');
        
        // Update all cards with new content and colors
        Array.from(cards).forEach((card, index) => {
            // Update color
            card.className = card.className.replace(/bg-\w+-500/, tasks[index].color);
            
            // Update content
            const span = card.querySelector('span');
            span.textContent = tasks[index].title;
        });
    }
    // Optional: Add click handlers for the cards
    document.querySelectorAll('.task-card').forEach(card => {
        card.addEventListener('click', () => {
            document.querySelectorAll('.task-card').forEach(c => c.classList.remove('active'));
            card.classList.add('active');
        });
    });
</script>
@endsection