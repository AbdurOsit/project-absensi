<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@heroicons/react@2.0.18/dist/outline/heroicons-outline.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=insert_chart" />
    <title>Sidebar Template</title>
</head>

<body class="bg-gray-100" id="theme-body">
    <!-- Navbar -->
<div id="navbar"
    class="min-w-full h-16 bg-white shadow-sm flex items-center justify-between z-10 transition-all duration-300 fixed text-gray-600">
    <!-- Left Side -->
    <div class="flex items-center">
        <h1 id="navbar-title" class="text-purple-800 font-semibold text-lg">Last Gen SIJA</h1>
        <span class=" ml-2" id="bar-text">|Dashboard</span>
    </div>

    <div class="flex flex-col justify-center items-center ">
        <span>07:30</span>
        <span class="mx-2" id="bar-text">Senin, 9 Desember 2024</span>
    </div>

    <!-- Right Side -->
    <div class="flex items-center space-x-4">
        <!-- Notification Icon -->
        <button class="p-2 hover:text-black hover:bg-gray-200 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none"
                viewBox="0 0 24 24" stroke="currentColor" id="bar-icon">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
        </button>

        <!-- Theme Toggle -->
        <button id="themeToggle" class="p-2 hover:bg-gray-200 rounded-lg hover:text-black">
            <!-- Sun Icon -->
            {{-- <svg id="sunIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg> --}}
            <i class='bx bx-sun text-2xl hidden' id="sunIcon"></i>

            <!-- Moon Icon -->
            {{-- <svg id="moonIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black hidden hover:text-black"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
            </svg> --}}
            <i class='bx bx-moon text-2xl ' id="moonIcon"></i>
        </button>

        <!-- Profile -->
        <div class="flex items-center space-x-2">
            <span class="" id="bar-text">Steve Griffin</span>
            <img src="/api/placeholder/32/32" alt="Profile" class="w-8 h-8 rounded-full bg-gray-200">
        </div>
    </div>
</div>
<div class="flex">
    <!-- Sidebar -->
    <div id="sidebar" class="left-0 top-0 h-full w-16 bg-purple-500 flex flex-col transition-all duration-200 rounded-full mt-28">
        <!-- Header Section -->
        <div class="w-full flex items-center h-16">
            <!-- Hamburger Menu (Visible when collapsed) -->
            <button id="openBtn" class="w-16 h-16 flex items-center justify-center text-white hover:bg-purple-600 hover:rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Admin Title and Close Button (Hidden by default) -->
            <div id="headerExpanded" class="hidden w-full px-4 flex justify-between items-center">
                <span class="text-white text-2xl font-semibold">Admin</span>
                <button id="closeBtn" class="w-16 h-16 flex items-center justify-center text-white hover:bg-purple-600 hover:rounded-3xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Navigation Items -->
        <div class="flex flex-col flex-1 pt-4">
            <!-- Home -->
            <a href="/user2" class="w-full flex items-center text-white hover:bg-purple-600">
                <div class="w-16 h-16 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
                <span class="hidden nav-text px-4">Home</span>
            </a>

            <!-- Documents -->
            <a href="/user2/rekap" class="w-full flex items-center text-white hover:bg-purple-600">
                <div class="w-16 h-16 flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined">
                        insert_chart
                    </span>
                </div>
                <span class="hidden nav-text px-4">Rekap</span>
            </a>

            <!-- Settings -->
            <a href="#" class="w-full flex items-center text-white hover:bg-purple-600 mt-36 mb-2">
                <div class="w-16 h-10 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <span class="hidden nav-text  px-4">Settings</span>
            </a>

            <!-- Logout at bottom -->
            <a href="#" class="w-full flex items-center text-white hover:bg-purple-600 mb-10">
                <div class="w-16 h-10 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </div>
                <span class="hidden nav-text py-8">Logout</span>
            </a>
        </div>
    </div>
    <!-- Main Content -->
    <div id="main-content" class="transition-all duration-300 mt-20 flex justify-center">
        @yield('user2')
    </div>
</div>

    
    <script>
        const sidebar = document.getElementById('sidebar');
        const openBtn = document.getElementById('openBtn');
        const closeBtn = document.getElementById('closeBtn');
        const mainContent = document.getElementById('main-content');
        const headerExpanded = document.getElementById('headerExpanded');
        const navTexts = document.querySelectorAll('.nav-text');

        const body = document.getElementById('theme-body');
        const themeToggle = document.getElementById('themeToggle');
        const sunIcon = document.getElementById('sunIcon');
        const moonIcon = document.getElementById('moonIcon');
        const navbar = document.getElementById('navbar');
        const bartext = document.getElementById('bar-text');
        const navbarTitle = document.getElementById('navbar-title');

        function expandSidebar() {          
            sidebar.classList.remove('w-16');
            sidebar.classList.add('w-64');
            sidebar.classList.remove('rounded-full');
            sidebar.classList.add('rounded-3xl');
            // mainContent.classList.remove('ml-16');
            // mainContent.classList.add('ml-64'); 
            // Tambahkan margin lebih besar
            openBtn.classList.add('hidden');
            headerExpanded.classList.remove('hidden');
            navTexts.forEach(text => text.classList.remove('hidden'));
        }

        function collapseSidebar() {
            sidebar.classList.remove('w-64');
            sidebar.classList.add('w-16');
            sidebar.classList.remove('rounded-3xl');
            sidebar.classList.add('rounded-full');
            // mainContent.classList.remove('ml-64');
            // mainContent.classList.add('ml-16'); 
            // Kembali ke margin awal
            openBtn.classList.remove('hidden');
            headerExpanded.classList.add('hidden');
            navbar.classList.remove('text-white');
            navbar.classList.add('text-gray-600');
            navTexts.forEach(text => text.classList.add('hidden'));
        }

        function toggleTheme() {
            const isLightMode = body.classList.contains('bg-gray-100');
            if (isLightMode) {
                // Activate dark mode
                body.classList.remove('bg-gray-100');
                body.classList.add('bg-gray-900', 'text-white');
                
                sidebar.classList.replace('bg-purple-500', 'bg-gray-700');
                navbar.classList.replace('bg-white', 'bg-gray-800');
                navbarTitle.classList.replace('text-purple-800', 'text-purple-400');
                // bartext.classList.replace('text-gray-600', 'text-white');
                bartext.forEach(text1 => text1.classList.replace('text-gray-600','text-white'))
                navTexts.forEach(text => text.classList.replace('text-gray-800', 'text-white'));
                mainContent.documentElement.classList.remove('bg-dark-300');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            } else {
                // Activate light mode
                body.classList.remove('bg-gray-900', 'text-white');
                body.classList.add('bg-gray-100');
                sidebar.classList.replace('bg-gray-700', 'bg-purple-500');
                navbar.classList.replace('bg-gray-800', 'bg-white');
                navbarTitle.classList.replace('text-purple-400', 'text-purple-800');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            }
        }
        openBtn.addEventListener('click', expandSidebar);
        closeBtn.addEventListener('click', collapseSidebar);
        themeToggle.addEventListener('click', toggleTheme);
    
    </script>
</body>

</html>