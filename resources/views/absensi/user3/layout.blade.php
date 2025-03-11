<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {},
            },
        };
    </script>
    <style>
        /* For smooth dark mode transition */
        * {
            transition: background-color 0.3s, color 0.3s;
        }

        select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            -webkit-appearance: none;
            appearance: none;
        }
    </style>
</head>

<body class="bg-white dark:bg-zinc-900 w-full">
    <nav class="w-full bg-white dark:bg-zinc-900 border-b border-gray-200 dark:border-gray-800 fixed top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-14">
                <!-- Logo and Title -->
                <div class="flex items-center space-x-2">
                    <span class="text-[#8B5CF6] dark:text-[#A78BFA] font-semibold">
                        Last Gen Sija
                    </span>
                    <span class="text-black dark:text-white ml-2">|</span>
                    <span class="text-black dark:text-white">Dashboard</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="dark:text-white font-semibold">07.10</span>
                    <span class="dark:text-white font-semibold">Senin, 09 Desember 2024</span>
                </div>

                <!-- Right side icons -->
                <div class="flex items-center space-x-4">
                    <!-- Bell Icon -->
                    <button class="text-black dark:text-white hover:text-gray-600 dark:hover:text-gray-300"
                        title="1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </button>
                    <!-- Theme Toggle Button -->
                    <button id="theme-toggle"
                        class="text-black dark:text-white hover:text-gray-600 dark:hover:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" title="2">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                    </button>
                    <!-- Username and Image-->
                    <div class="flex" style="align-items: center">
                        {{-- Image --}}
                        <div class="h-8 w-8 rounded-full bg-gray-200 dark:bg-gray-700">
                            <img src="{{ asset('image/' . Auth::user()->image) }}" alt="Profile"
                            class="w-8 h-8 rounded-full" />
                        </div>
                        {{-- Username --}}
                        <div class="text-black dark:text-white ml-3">{{ Auth::user()->username }}</div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex pt-14">
        <div id="sidebar"
            class="left-0 top-0 h-full w-16 bg-purple-500 dark:bg-zinc-800 flex flex-col transition-all duration-200 rounded-full mt-8 ml-3">
            <!-- Header Section -->
            <div class="w-full flex items-center h-16">
                <!-- Hamburger Menu (Visible when collapsed) -->
                <button id="openBtn"
                    class="w-16 h-16 flex items-center justify-center text-white hover:bg-purple-600 hover:rounded-full"
                    title="3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Admin Title and Close Button (Hidden by default) -->
                <div id="headerExpanded" class="hidden w-full px-4 flex justify-between items-center">
                    <span class="text-white text-2xl font-semibold">Menu</span>
                    <button id="closeBtn"
                        class="w-16 h-16 flex items-center justify-center text-white hover:bg-purple-600 hover:rounded-3xl"
                        title="4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
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
                <a href="/user" class="w-full flex items-center text-white hover:bg-purple-600">
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
                <a href="/user/rekap" class="w-full flex items-center text-white hover:bg-purple-600">
                    <div class="w-16 h-16 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 3v4a1 1 0 0 1-1 1H5m4 10v-2m3 2v-6m3 6v-3m4-11v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                            </svg>
                        </span>
                    </div>
                    <span class="hidden nav-text px-4">Rekap</span>
                </a>

                <!-- Settings -->
                <a href="#" class="w-full flex items-center text-white hover:bg-purple-600 mt-44 mb-2">
                    <div class="w-16 h-16 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <span class="hidden nav-text px-4">Settings</span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center text-white hover:bg-purple-600 hover:rounded-b-3xl mb-0.1">
                        <div class="w-16 h-16 flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </div>
                        <span class="hidden nav-text">Logout</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="flex-6 p-3 w-full justify-center items-center">
            <!-- Content -->
            @yield('user3')
        </div>
    </div>
    <script>
        // Set default theme to dark if not already set
        if (!("theme" in localStorage)) {
            localStorage.theme = "dark"; // Default to dark mode
        }

        // Apply the theme on page load
        if (localStorage.theme === "dark") {
            document.documentElement.classList.add("dark"); // Add 'dark' class to <html>
        } else {
            document.documentElement.classList.remove("dark"); // Remove 'dark' class from <html>
        }

        // Theme toggle functionality
        const themeToggle = document.getElementById("theme-toggle");
        themeToggle.addEventListener("click", () => {
            // Toggle dark class on html element
            document.documentElement.classList.toggle("dark");

            // Update localStorage
            if (document.documentElement.classList.contains("dark")) {
                localStorage.theme = "dark";
            } else {
                localStorage.theme = "light";
            }
        });

        // Sidebar functionality
        const sidebar = document.getElementById("sidebar");
        const openBtn = document.getElementById("openBtn");
        const closeBtn = document.getElementById("closeBtn");
        const headerExpanded = document.getElementById("headerExpanded");
        const navTexts = document.querySelectorAll(".nav-text");

        function expandSidebar() {
            sidebar.classList.remove("w-16");
            sidebar.classList.add("w-64");
            sidebar.classList.remove("rounded-full");
            sidebar.classList.add("rounded-3xl");
            openBtn.classList.add("hidden");
            headerExpanded.classList.remove("hidden");
            navTexts.forEach((text) => text.classList.remove("hidden"));
        }

        function collapseSidebar() {
            sidebar.classList.remove("w-64");
            sidebar.classList.add("w-16");
            sidebar.classList.remove("rounded-3xl");
            sidebar.classList.add("rounded-full");
            openBtn.classList.remove("hidden");
            headerExpanded.classList.add("hidden");
            navTexts.forEach((text) => text.classList.add("hidden"));
        }

        openBtn.addEventListener("click", expandSidebar);
        closeBtn.addEventListener("click", collapseSidebar);

        
    </script>
</body>

</html>
