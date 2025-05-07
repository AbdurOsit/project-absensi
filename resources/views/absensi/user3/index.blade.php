@extends('absensi.user3.layout')
@section('user3')
    @if (session('sukses'))
        <div class="bg-green-500 text-white p-3 rounded">
            {{ session('sukses') }}
        </div>
    @endif
    <!-- Jadwal Pelajaran, Tugas,Praktek,Kegiatan Minggu Ini Section -->
    <div class="space-y-1">
        <h3 class="text-gray-900 dark:text-white text-xl md:text-3xl font-bold mx-3 md:ml-12">Jadwal</h3>
        {{-- Jadwal Pelajaran Section --}}
        <div class="bg-gray-300 dark:bg-zinc-800 p-2 md:p-6 rounded-2xl flex space-x-1 md:space-x-1 mx-2 md:ml-28">
            <!-- Previous button -->
            <button onclick="moveCarousel('left')"
                class="text-purple-600 dark:text-purple-400 p-1 md:p-2 rounded-lg hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="md:w-20 md:h-20"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6" />
                </svg>
            </button>

            <div id="carousel" class="flex space-x-1 md:space-x-4 flex-1 justify-center carousel-container">
                <!-- Filled by JS -->
            </div>

            <!-- Next button -->
            <button onclick="moveCarousel('right')"
                class="text-purple-600 dark:text-purple-400 p-1 md:p-2 rounded-lg hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="md:w-20 md:h-20"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </button>
        </div>

        {{-- Tugas Section --}}
        {{-- <div class="bg-gray-300 dark:bg-zinc-800 p-3 md:p-6 rounded-2xl flex space-x-2 md:space-x-1 mx-4 md:ml-28 mt-8">
            <!-- Previous button -->
            <button onclick="moveTugasCarousel('left')" class="text-purple-600 dark:text-purple-400 p-1 md:p-2 rounded-lg hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="md:w-20 md:h-20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6"/>
                </svg>
            </button>

            <div id="tugas-carousel" class="flex space-x-4 flex-1 justify-center carousel-container" data-tugas='@json($tugas)'>
                <!-- Slide cards akan diisi via JS -->
            </div> --}}

            {{-- <!-- Next button -->
            <button onclick="moveTugasCarousel('right')" class="text-purple-600 dark:text-purple-400 p-1 md:p-2 rounded-lg hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="md:w-20 md:h-20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"/>
                </svg>
            </button>
        </div> --}}
    </div>

    <div class="flex flex-col md:flex-row p-2 md:p-3">
        <!-- Praktek Section -->
            <div class="space-y-1 mt-4 mx-2 md:ml-10 w-full md:w-auto">
                <h3 class="text-gray-900 dark:text-white text-base md:text-xl font-bold">Praktek Minggu Ini</h3>
                <div class="bg-gray-300 dark:bg-zinc-800 rounded-lg w-full md:w-52">
                    <div class="space-y-1 h-auto">
                        <div class="space-y-1 h-auto pb-2">
                            @if ($kegiatan->isEmpty())
                                <p class="text-center dark:text-white text-base font-bold flex justify-center items-center">Tidak
                                    ada Praktek</p>
                            @else
                                @foreach ($praktek as $item)
                                    <li
                                        class="flex items-center gap-2 bg-white dark:bg-gray-700 p-2 rounded-lg shadow-sm mx-2 my-1">
                                        <button class="w-5 h-5 md:w-8 md:h-8 flex items-center justify-center rounded-full">
                                            <svg class="bg-blue-500 w-6 h-auto md:w-10 rounded-full text-gray-800 dark:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                            </svg>
                                        </button>
                                        <span class="text-gray-900 dark:text-white text-xs md:font-medium">{{ $item->hari }} -
                                            {{ $item->praktek ?? 'Tidak Ada Praktek' }}</span>
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
            <div class="space-y-1 mt-4 mx-2 md:ml-5 w-full md:w-auto">
                <h3 class="text-gray-900 dark:text-white text-base md:text-xl font-bold">Kegiatan Minggu Ini</h3>
                <div class="bg-gray-300 dark:bg-zinc-800 rounded-lg w-full md:w-48">
                    <div class="space-y-1 h-auto pb-2">
                        @if ($kegiatan->isEmpty())
                            <p class="text-center dark:text-white text-base font-bold flex justify-center items-center">Tidak ada
                                kegiatan</p>
                        @else
                            @foreach ($kegiatan as $item)
                                <li
                                    class="flex items-center gap-2 bg-white dark:bg-gray-700 p-2 md:p-4 rounded-lg shadow-sm mx-2 my-1">
                                    <button class="w-5 h-5 md:w-8 md:h-8 flex items-center justify-center rounded-full">
                                        <svg class="bg-blue-500 w-6 h-auto md:w-10 rounded-full text-gray-800 dark:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                        </svg>
                                    </button>
                                    <span class="text-gray-900 dark:text-white text-xs md:font-medium">{{ $item->hari }} -
                                        {{ $item->kegiatan ?? 'Tidak Ada Kegiatan' }}</span>
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
            <div class="bg-gray-100 dark:bg-zinc-800 rounded-xl mt-6 mx-2 md:ml-5 p-2 md:p-4 shadow-md w-full md:w-auto">
                <h3 class="text-gray-900 dark:text-white text-lg md:text-2xl font-bold mb-2 md:mb-4">Absensi Hari Ini</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-gray-900 dark:text-white border-collapse text-xs md:text-base">
                        <thead>
                            <tr class="bg-blue-500 text-white text-left">
                                <th class="py-1 md:py-3 px-1 md:px-4 rounded-tl-lg">No. Card</th>
                                <th class="py-1 md:py-3 px-1 md:px-4">Nama</th>
                                <th class="py-1 md:py-3 px-1 md:px-4">Status</th>
                                <th class="py-1 md:py-3 px-1 md:px-4">Waktu Kedatangan</th>
                                <th class="py-1 md:py-3 px-1 md:px-4 rounded-tr-lg">Waktu Pulang</th>
                            </tr>
                        </thead>
                        
                        {{-- <tbody id="absensiRealtimeBody"> --}}
                        <tbody>
                            @if ($absensi)
                            @foreach ($absensi as $item)
                                <tr class="bg-white dark:bg-gray-700 text-center shadow-sm">
                                    <td class="py-1 md:py-3 px-1 md:px-4">{{ $item->uid }}</td>
                                    <td class="py-1 md:py-3 px-1 md:px-4">{{ $item->username }}</td>
                                    <td class="py-1 md:py-3 px-1 md:px-4">{{ $item->status }}</td>
                                    <td class="py-1 md:py-3 px-1 md:px-4">{{ $item->waktu_datang }}</td>
                                    <td class="py-1 md:py-3 px-1 md:px-4">{{ $item->waktu_pulang }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr class="bg-white dark:bg-gray-700 text-center shadow-sm">
                                    <td colspan="5" class="py-1 md:py-3 px-1 md:px-4 text-gray-500 italic">Belum ada
                                        absensi</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="flex justify-end text-center mt-3">
                        {{ $absensi->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>

    </div>
    <script>
        const jadwal = [{
                hari: "Senin",
                pelajaran: [{
                        nama: "Matematika",
                        jam: "07.00 - 08.30"
                    },
                    {
                        nama: "B. Indonesia",
                        jam: "08.30 - 10.00"
                    },
                    {
                        nama: "PPKN",
                        jam: "10.00 - 11.30"
                    }
                ]
            },
            {
                hari: "Selasa",
                pelajaran: [{
                        nama: "IPA",
                        jam: "07.00 - 08.30"
                    },
                    {
                        nama: "IPS",
                        jam: "08.30 - 10.00"
                    }
                ]
            },
            {
                hari: "Rabu",
                pelajaran: [{
                        nama: "B. Inggris",
                        jam: "07.00 - 08.30"
                    },
                    {
                        nama: "Seni Budaya",
                        jam: "08.30 - 10.00"
                    }
                ]
            },
            {
                hari: "Kamis",
                pelajaran: [{
                        nama: "PJOK",
                        jam: "07.00 - 08.30"
                    },
                    {
                        nama: "Informatika",
                        jam: "08.30 - 10.00"
                    }
                ]
            },
            {
                hari: "Jumat",
                pelajaran: [{
                        nama: "Keagamaan",
                        jam: "07.00 - 08.30"
                    },
                    {
                        nama: "Prakarya",
                        jam: "08.30 - 10.00"
                    }
                ]
            }
        ];

        const colors = ['bg-blue-500', 'bg-green-500', 'bg-yellow-500', 'bg-red-500', 'bg-purple-500'];
        let currentIndex = 0;

        function generateSlides() {
            const carousel = document.getElementById('carousel');
            carousel.innerHTML = '';

            const isMobile = window.innerWidth < 768;
            const visibleCards = isMobile ? 1 : 3; // Show only 1 card on mobile
            
            for (let i = 0; i < visibleCards; i++) {
                const index = (currentIndex + i) % jadwal.length;
                const item = jadwal[index];

                const card = document.createElement('div');
                card.className =
                    `${isMobile ? 'w-full' : 'w-60'} md:w-60 min-h-[180px] ${colors[index % colors.length]} rounded-xl shadow-lg p-3 flex flex-col justify-start transition duration-300 ease-in-out`;

                let htmlContent = `<div class="font-bold text-white text-base md:text-lg mb-2 text-center">${item.hari}</div>`;
                item.pelajaran.forEach(p => {
                    htmlContent += `
                        <div class="flex justify-between text-xs md:text-base text-white py-1 gap-2">
                            <span class="truncate w-1/2">${p.nama}</span>
                            <span class="text-right w-1/2 text-xs md:text-base">${p.jam}</span>
                        </div>
                    `;
                });

                card.innerHTML = htmlContent;
                carousel.appendChild(card);
            }
        }

        function moveCarousel(direction) {
            if (direction === 'right') {
                currentIndex = (currentIndex + 1) % jadwal.length;
            } else if (direction === 'left') {
                currentIndex = (currentIndex - 1 + jadwal.length) % jadwal.length;
            }
            generateSlides();
        }
        
        // Handle resize to adjust carousel
        window.addEventListener('resize', generateSlides);
        
        // Inisialisasi saat halaman dimuat
        document.addEventListener("DOMContentLoaded", generateSlides);

        const tugasData = @json($tugas);
        const tugasColors = ['bg-red-500', 'bg-blue-500', 'bg-yellow-500', 'bg-green-500', 'bg-gray-500'];
        let tugasIndex = 0;

    function generateTugasSlides() {
        const carousel = document.getElementById('tugas-carousel');
        if (!carousel) return; // Guard clause if element doesn't exist
        
        carousel.innerHTML = '';
        
        const isMobile = window.innerWidth < 768;
        const visibleCards = isMobile ? 1 : 3; // Show only 1 card on mobile

        for (let i = 0; i < visibleCards; i++) {
            const index = (tugasIndex + i) % tugasData.length;
            const tugas = tugasData[index];

            const card = document.createElement('div');
            card.className = `${isMobile ? 'w-full' : 'w-60'} md:w-72 h-auto p-3 rounded-xl shadow-lg text-white ${tugasColors[i % tugasColors.length]}`;
            card.innerHTML = `
                <h3 class="text-center font-bold text-base md:text-xl mb-2">${tugas.hari}</h3>
                <p class="text-xs md:text-sm mb-1">Tanggal: <span class="float-right">${tugas.tanggal}</span></p>
                <p class="text-xs md:text-sm mb-1">Tugas: <span class="float-right">${tugas.judul}</span></p>
                <p class="text-xs md:text-sm">Deadline: <span class="float-right">${tugas.deadline_hari}, ${tugas.deadline_tanggal}</span></p>
            `;
            carousel.appendChild(card);
        }
    }

    function moveTugasCarousel(direction) {
        if (direction === 'right') {
            tugasIndex = (tugasIndex + 1) % tugasData.length;
        } else if (direction === 'left') {
            tugasIndex = (tugasIndex - 1 + tugasData.length) % tugasData.length;
        }
        generateTugasSlides();
    }

    // // Initial load for tugas carousel (if it exists)
    // if (document.getElementById('tugas-carousel')) {
    //     generateTugasSlides();
    //     // Handle resize for tugas carousel
    //     window.addEventListener('resize', generateTugasSlides);
    // }

    //     function fetchAbsensiUser() {
    //         fetch('/user/absensi/realtime')
    //             .then(response => response.json())
    //             .then(data => {
    //                 const tbody = document.getElementById('absensiRealtimeBody');
    //                 tbody.innerHTML = '';

    //                 if (data) {
    //                     const row = `
    //                         <tr class="bg-white dark:bg-gray-700 text-center shadow-sm">
    //                             <td class="py-1 md:py-3 px-1 md:px-4">${data.uid}</td>
    //                             <td class="py-1 md:py-3 px-1 md:px-4">${data.username}</td>
    //                             <td class="py-1 md:py-3 px-1 md:px-4">${data.status}</td>
    //                             <td class="py-1 md:py-3 px-1 md:px-4">${data.waktu_datang ?? '-'}</td>
    //                             <td class="py-1 md:py-3 px-1 md:px-4">${data.waktu_pulang ?? '-'}</td>
    //                         </tr>
    //                     `;
    //                     tbody.innerHTML = row;
    //                     } else {
    //                     tbody.innerHTML = `
    //                         <tr class="bg-white dark:bg-gray-700 text-center shadow-sm">
    //                             <td colspan="5" class="py-1 md:py-3 px-1 md:px-4 text-gray-500 italic">Belum ada absensi</td>
    //                         </tr>
    //                     `;
    //                 }
    //             });
    //     }

    //     // Jalankan setiap 3 detik
    //     setInterval(fetchAbsensiUser, 3000);
    </script>
@endsection