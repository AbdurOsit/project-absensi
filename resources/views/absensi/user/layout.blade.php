<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@heroicons/react@2.0.18/dist/outline/heroicons-outline.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .p {
            color: rgb(164, 14, 209);
        }
    </style>
</head>

<body class="transition-all">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div id="sidebar"
            class="w-16 h-screen bg-gray-900 text-white flex flex-col py-4 fixed transition-all duration-300 overflow-x-hidden">
            <!-- Top Section -->
            <div class="flex flex-col space-y-4">
                <!-- Menu Button (visible when closed) -->
                <div id="menuButton" class="flex items-center justify-center cursor-pointer">
                    <div class="w-6 h-6 flex-shrink-0">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </div>
                </div>

                <!-- Menu Header (visible when open) -->
                <div id="menuHeader" class="hidden px-4 relative items-center justify-center">
                    <span class="text-center block">Menu</span>
                    <button class="absolute right-4 top-0 w-6 h-6 flex items-center justify-center" id="closeButton"
                        title="Tutup Sidebar">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>

                <!-- Navigation Items -->
                <div class="flex flex-col space-y-2">
                    <a href="{{ route('user.index') }}">
                        <div class="flex items-center px-4 py-2 hover:bg-gray-800 rounded-lg mx-2 cursor-pointer">
                            <div class="w-6 h-6 flex-shrink-0">
                                {{-- icon home --}}
                                <svg class="w-6 h-6 text-purple-400" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                            </div>
                            <span class="ml-4 hidden whitespace-nowrap">Home</span>
                        </div>
                    </a>

                    <a href="{{ route('user.rekap') }}">
                        <div class="flex items-center ml-3 px-4 py-2 hover:bg-gray-800 rounded-lg mx-2 cursor-pointer">
                            <div class="w-6 h-6 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    :class="{ 'text-white': theme === 'light', 'text-purple-400': theme === 'dark' }">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="9" y1="17" x2="9" y2="10"></line>
                                    <line x1="12" y1="17" x2="12" y2="7"></line>
                                    <line x1="15" y1="17" x2="15" y2="13"></line>
                                </svg>
                            </div>
                            <span class="ml-4 hidden whitespace-nowrap">Chart</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Bottom Section -->
            <div class="mt-auto flex flex-col space-y-2">
                <div class="flex items-center px-4 py-2 hover:bg-gray-800 rounded-lg mx-2 cursor-pointer">
                    <div class="w-6 h-6 flex-shrink-0">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                            </path>
                        </svg>
                    </div>
                    <span class="ml-4 hidden whitespace-nowrap">Settings</span>
                </div>

                <div class="flex items-center px-4 py-2 hover:bg-gray-800 rounded-lg mx-2 cursor-pointer">
                    <div class="w-6 h-6 flex-shrink-0">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                    </div>
                    <span class="ml-4 hidden whitespace-nowrap">Logout</span>
                </div>
            </div>
        </div>
        <div id="mainContent" class="flex-1 ml-16">
            @yield('user') <!-- Content Section -->
        </div>
    </div>

    <script>
        const moonIcon = document.querySelector('.moon');
        const sunIcon = document.querySelector('.sun');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        // const subcontent = document.getElementById('subcontent');
        const content = document.getElementById('content');
        // // const subcontent2 = document.getElementById('subcontent2');
        // const tugas = document.getElementById('tugas');
        // const jadwal = document.getElementById('jadwal');
        // const absen = document.getElementById('absen');
        const navBar = document.querySelector('nav');
        const title = document.getElementById('title');
        const spans = document.querySelectorAll('#sidebar span');
        const icons = document.querySelectorAll('#sidebar svg');
        const menuButton = document.getElementById('menuButton');
        const menuHeader = document.getElementById('menuHeader');
        const closeButton = document.getElementById('closeButton'); // Tombol tutup untuk sidebar
        let isSidebarOpen = false;
    
        // Fungsi untuk menyimpan tema ke localStorage
        function saveTheme(theme) {
            localStorage.setItem('theme', theme);
        }
    
        // Fungsi untuk memuat tema dari localStorage
        function loadTheme() {
            return localStorage.getItem('theme') || 'moon'; // Default adalah tema "moon"
        }
    
        // Fungsi untuk mengatur tema
        function setTheme(theme) {
            if (theme === 'sun') {
                //jika mode Light
                sidebar.classList.add('bg-purple-700');
                sidebar.classList.remove('bg-gray-900');
                mainContent.classList.add('bg-purple-100');
                mainContent.classList.remove('bg-gray-800');
                content.classList.add('text-black');
                content.classList.remove('bg-gray-900');
                // subcontent.classList.remove('bg-gray-900');
                // subcontent.classList.remove('bg-gray-800');
                navBar.classList.add('bg-purple-600');
                navBar.classList.remove('bg-gray-700');
                title.classList.remove('text-puple-400');
                title.classList.add('text-white');
                spans.forEach(span => span.classList.add('text-white'));
                icons.forEach(icon => icon.classList.add('text-white'));
                
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            } else {
                //jika mode Dark
                sidebar.classList.add('bg-gray-900');
                sidebar.classList.remove('bg-purple-700');
                mainContent.classList.add('bg-gray-800');
                mainContent.classList.remove('bg-purple-100');
                content.classList.remove('text-black');
                content.classList.add('text-white');
                content.classList.add('bg-gray-900');
                navBar.classList.add('bg-gray-700');
                navBar.classList.remove('bg-purple-600');
                title.classList.add('text-puple-400');
                title.classList.remove('text-white');
                spans.forEach(span => span.classList.remove('text-white'));
                icons.forEach(icon => icon.classList.remove('text-white'));
                
                moonIcon.classList.add('hidden');
                sunIcon.classList.remove('hidden');
            }
    
            saveTheme(theme);
        }
    
        moonIcon.addEventListener('click', () => setTheme('moon'));
        sunIcon.addEventListener('click', () => setTheme('sun'));
    
        // Fungsi untuk membuka/menutup sidebar
        function toggleSidebar() {
            isSidebarOpen = !isSidebarOpen;
            if (isSidebarOpen) {
                sidebar.classList.add('w-64');
                sidebar.classList.remove('w-16');
                mainContent.classList.add('ml-64');
                mainContent.classList.remove('ml-16');
                spans.forEach(span => span.classList.remove('hidden'));
                menuButton.classList.add('hidden'); // Sembunyikan menuButton saat sidebar terbuka
                menuHeader.classList.remove('hidden'); // Tampilkan menuHeader
            } else {
                sidebar.classList.add('w-16');
                sidebar.classList.remove('w-64');
                mainContent.classList.add('ml-16');
                mainContent.classList.remove('ml-64');
                spans.forEach(span => span.classList.add('hidden'));
                menuButton.classList.remove('hidden'); // Tampilkan kembali menuButton saat sidebar tertutup
                menuHeader.classList.add('hidden'); // Sembunyikan menuHeader
            }
        }
    
        menuButton.addEventListener('click', toggleSidebar);
        closeButton.addEventListener('click', toggleSidebar); // Menutup sidebar saat tombol close diklik
    
        // Muat tema saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = loadTheme();
            setTheme(savedTheme);
        });
    </script>
</body>

</html>