<!DOCTYPE html>
<html data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
    <!-- Css -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        *{
            font-family: "Poppins", serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        :root {
            /* ===== Colors ===== */
            --body-color: #E4E9F7;
            --sidebar-color: #FFF;
            --primary-color: #695CFE;
            --primary-color-light: #F6F5FF;
            --toggle-color: #DDD;
            --text-color: #f5eded;
        
            /* ===== Transition ===== */
            --tran-02: all 0.2s ease;
            --tran-03: all 0.3s ease;
            --tran-04: all 0.4s ease;
            --tran-05: all 0.5s ease;
        }        

        body{
            height: 100vh;
            background: var(--body-color);
            transition: var(--tran-05);
        }

        /*Resuable Css*/
        .sidebar .text{
            font-size: 16px;
            font-weight: 500;
            color: var(--text-color);
            transition: var(--tran-04);
            white-space: nowrap;
            opacity: 1;
        }

        .sidebar .image{
            min-width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /*Sidebar*/
        .sidebar{
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 270px;
            padding: 10px 14px;
            background-color: var(--primary-color);
            transition: var(--tran-05);
            z-index: 100;
        }
        .sidebar.close{
            width: 88px;
        }
        .sidebar.close .text{
            opacity: 0;
        }
        .sidebar li{
            height: 50px;
            margin-top: 10px;
            list-style: none;
            display: flex;
            align-items: center;
        }
        .sidebar li .icon{
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            min-width: 60px;
        }
        .sidebar li .icon,
        .sidebar li .text{
            color: var(--text-color);
        }
        
        .sidebar header .image-text{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .sidebar header{
            position: relative;
            color: var(--text-color);

        }
        header .image-text .header-text{
            display: flex;
            flex-direction: column;
        }
        .header-text .name{
            font-weight: 600;
            font-size: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .header-text .name.close{
            opacity: 0;
        }
        .header-text .icon.close{
            opacity: 1;
            left: 20px;
        }
        .header-text .icon{
            opacity: 0;
        }

        .sidebar header .toggle{
            position: absolute;
            top: 50%;
            right: -25px;
            transform: translateY(-50%) rotate(180deg);
            height: 25px;
            width: 25px;
            background: var(--text-color);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: var(--primary-color);
            font-size: 22px;
            transition: var(--tran-03);
        }

        .sidebar.close header .toggle{
            transform: translateY(-50%);
        }
        body.dark .sidebar header .toggle{
            color: var(--text-color);
        }
        .sidebar .menu{
            margin-top: 0;
        }
      
        .sidebar li a{
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            text-decoration: none;
            border-radius: 6px;
            transition: var(--tran-04);
        }
        .sidebar li a:hover{
            background: rgb(240, 240, 6);
        }
        .sidebar .yellow{
            background: yellow;
            border-radius: 5px;
        }
        .sidebar li a .icon,
        .sidebar li a .text{
            color: var(--text-color);
            transition: var(--tran-02);
        }
        .sidebar li a:hover .icon,
        .sidebar li a:hover .text{
            color: black;
        }
        body.dark .sidebar li a:hover .icon,
        body.dark .sidebar li a:hover .text{
            color: var(--text-color);
        }
        .sidebar .menu-bar{
            height: calc(100% - 50px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .menu-bar .mode{
            position: relative;
            border-radius: 6px;
            background: var(--primary-color);
        }

        .menu-bar .mode .moon-sun{
            height: 50px;
            width: 60px;
            display: flex;
            align-items: center;
        }
        .menu-bar .mode i{
            position: absolute;
            transition: var(--tran-03);
        }
        .menu-bar .mode i.sun{
            opacity: 0;
        }
        body.dark .menu-bar .mode i.sun{
            opacity: 1;
        }
        body.dark .menu-bar .mode i.moon{
            opacity: 0;
        }
        .menu-bar .mode .sun{
            opacity: 0;
        }
        .menu-bar .mode .toggle-switch{
            position: absolute;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            min-width: 60px;
            cursor: pointer;
            background: var(--primary-color);
        }
        .toggle-switch .switch{
            position: relative;
            height: 22px;
            width: 44px;
            border-radius: 25px;
            background: var(--toggle-color);
        }
        .switch::before{
            content: '';
            position: absolute;
            border-radius: 50%;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            height: 15px;
            width: 15px;
            background: var(--primary-color);
            transition: var(--tran-03);
        }
        body.dark .switch::before{
            left: 24px;
        }
        body.dark {
            --body-color: #18191A;
            --sidebar-color: #242526;
            --primary-color: #3A3B3C;
            --primary-color-light: #3A3B3C;
            --toggle-color: #FFF;
            --text-color: #CCC;
        }
        .home{
            position: relative;
            height: 100vh;
            left: 250px;
            width: calc(100% - 250px);
            transition: var(--tran-05);
        }
        .home .text{
            font-size: 30px;
            font-weight: 500;
            color: var(--text-color);
            padding: 8px 40px;
        }

        .sidebar.close ~ .home{
            left: 88px;
            width: calc(100% - 88px);
        }
        /* Tema khusus untuk Tailwind */
        [data-theme="dark"] {
            --tw-bg-opacity: 1;
            --tw-text-opacity: 1;
            background-color: rgba(31, 41, 55, var(--tw-bg-opacity)); /* Warna abu-abu gelap */
            color: rgba(255, 255, 255, var(--tw-text-opacity)); /* Teks putih */
        }

        [data-theme="light"] {
            --tw-bg-opacity: 1;
            --tw-text-opacity: 1;
            background-color: rgba(255, 255, 255, var(--tw-bg-opacity)); /* White background */
            color: rgba(31, 41, 55, var(--tw-text-opacity)); /* Dark text */
        }

        [data-theme="dark"] body {
            background-color: rgba(31, 41, 55, var(--tw-bg-opacity));
        }

        [data-theme="light"] body {
            background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
        }
        [data-theme="light"] .link {
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }
        [data-theme="light"] input {
            background-color: rgba(253, 251, 251, var(--tw-bg-opacity)); /* Light search */
            border: 2px solid black;
            color: black;
        }
        [data-theme="light"] .search-icon {
            color: black;
        }
        [data-theme="light"] .notif {
                color: black; /* Dark table */
        }
        [data-theme="light"] .sun {
                    color: black;
                    opacity: 1; /* Light Mode */
        }
        [data-theme="light"].moon {
            color: gray;
            opacity: 1; /* Light Mode */
        }
        [data-theme="dark"] table {
            background-color: rgba(55, 65, 81, var(--tw-bg-opacity)); /* Dark table */
        }

        [data-theme="light"] table {
            background-color: rgb(217, 221, 228, var(--tw-bg-opacity)); /* Light table */
        }

        [data-theme="dark"] th,
        [data-theme="dark"] td {
            color: rgba(255, 255, 255, var(--tw-text-opacity)); /* White text for dark mode */
        }

        [data-theme="light"] th,
        [data-theme="light"] td {
            color: rgba(31, 41, 55, var(--tw-text-opacity)); /* Dark text for light mode */
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleTheme() {
            const htmlElement = document.documentElement;
            const currentTheme = htmlElement.getAttribute("data-theme");
            const newTheme = currentTheme === "dark" ? "light" : "dark";
            htmlElement.setAttribute("data-theme", newTheme);

            // Simpan preferensi pengguna di localStorage
            localStorage.setItem("theme", newTheme);

            // Perbarui ikon mode
            updateThemeIcons(newTheme);

            }
        function updateThemeIcons(theme) {
            const sunIcon = document.querySelector(".sun");
            const moonIcon = document.querySelector(".moon");
        
            if (theme === "dark") {
                sunIcon.style.display = "none";
                moonIcon.style.display = "inline";
            } else {
                sunIcon.style.display = "inline";
                moonIcon.style.display = "none";
            }
            }
    
            // Atur tema sesuai preferensi pengguna saat halaman dimuat
            document.addEventListener("DOMContentLoaded", () => {
            const savedTheme = localStorage.getItem("theme") || "dark";
            document.documentElement.setAttribute("data-theme", savedTheme);
    
            // Perbarui ikon mode saat halaman dimuat
            updateThemeIcons(savedTheme);
            });
    
    </script>
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="min-h-screen p-6 ">
    <nav class="sidebar close">
        <header>
            {{-- <div class="image-text">
                <i class='bx bx-menu menu' style="display: flex; font-size: 30px; margin-top: 10px"></i>
                <div class="text header-text">
                    <span class="name"><span style="color: yellow">A</span>bsensi</span>
                </div>
            </div> --}}
            <button id="openBtn" class="mx-auto p-2 hover:bg-purple-700 rounded-lg" title="button 1">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
            </button>

            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                
                <ul class="menu-links">
                    <li class="{{ ($title == 'input') ? 'yellow' : 'nav-link' }} link">
                        <a href="{{ route('absensi.input')}}">
                            <i class='bx bxs-pencil icon' style="color:{{ ($title == 'input') ? 'black' : '' }}"></i>
                            <span class="text nav-text" style="color:{{ ($title == 'input') ? 'black' : '' }}">Input Data</span>
                        </a>
                    </li>

                    <li class="{{ ($title == 'data') ? 'yellow' : 'nav-link' }} link">
                        <a href="{{ route('absensi.data') }}">
                            <i class='bx bx-layer icon' style="color:{{ ($title == 'data') ? 'black' : '' }}"></i>
                            <span class="text nav-text" style="color:{{ ($title == 'data') ? 'black' : '' }}">Data Siswa</span>
                        </a>
                    </li>
                    <li class="{{ ($title == 'rekap') ? 'yellow' : 'nav-link' }} link">
                        <a href="{{ route('absensi.rekap') }}">
                            <i class='bx bxs-grid-alt icon' style="color:{{ ($title == 'rekap') ? 'black' : '' }}"></i>
                            <span class="text nav-text" style="color:{{ ($title == 'rekap') ? 'black' : '' }}">Rekapitulasi Absensi</span>
                        </a>
                    </li>
                    <li class="{{ ($title == 'scan') ? 'yellow' : 'nav-link' }} link">
                        <a href="{{ route('absensi.scan') }}">
                            <i class='bx bxs-id-card icon' style="color:{{ ($title == 'scan') ? 'black' : '' }}"></i>
                            <span class="text nav-text" style="color:{{ ($title == 'scan') ? 'black' : '' }}">Scan Card</span>
                        </a>
                    </li>
                    <li class="{{ ($title == 'surat') ? 'yellow' : 'nav-link' }} link">
                        <a href="{{ route('absensi.surat') }}">
                            <i class='fas fa-file-alt icon' style="color:{{ ($title == 'surat') ? 'black' : '' }}"></i>
                            <span class="text nav-text" style="color:{{ ($title == 'surat') ? 'black' : '' }}">Input Surat</span>
                        </a>
                    </li>
                    {{-- <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
            <div class="bottom-content">
                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Log Out</span>
                    </a>
                </li>
                {{-- <li class="mode">
                    <div class="moon-sun">
                        <i class='bx bx-moon icon moon' ></i>
                        <i class='bx bx-sun icon sun' ></i>
                    </div>
                    <span class="mode-text text">Dark Mode</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li> --}}
            </div>
        </div>
    </nav>

    <section class="home">
        <!-- Header with search and controls -->
        <div class="flex justify-between items-center mb-8">
            @if ($title == 'rekap' )
            <h1 class="ml-5">Absensi || Dashboard</h1>
            @endif
            <h1></h1>
            <div class="flex justify-end items-center space-x-4">
                @if ($title == 'rekap')
                <div class=""></div>
                @else
                <div class="relative w-64 mr-4">
                    <input
                        type="text"
                        placeholder="search.."
                        class="w-full bg-gray-700 text-gray-200 pl-8 pr-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600 dark:bg-gray-700 dark:text-gray-200 
                        light:bg-white light:border-black lig   ht:text-black"
                    />
                    <svg
                        class="w-4 h-4 absolute left-2.5 top-3 text-gray-400 search-icon"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />
                    </svg>
                </div>
            @endif
                {{-- Bell --}}
                
                <button class="notif" title="Notification">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>
                <!-- Mode Sun/Moon -->
                <button onclick="toggleTheme()" class="text-gray-400 border border-none" title="Toggle Mode">
        
                    {{-- Sun --}}
                    
                    <svg class="w-6 h-6 text-black sun" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
        
                    {{-- Moon --}}
                    <svg class="w-6 h-6 text-white moon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
                <i class='bx bx-user-circle text-5xl'></i>
            </div>
        </div>
        @yield('content')
    </section>

    <script>
        const openBtn = document.getElementById('openBtn');
        const body = document.querySelector("body"),
              sidebar = body.querySelector(".sidebar"),
              toggle = body.querySelector(".toggle"),
              menu = body.querySelector(".menu"),
              modeSwitch = body.querySelector(".toggle-switch"),
              modeText = body.querySelector(".mode-text");

        // Memeriksa status sidebar saat halaman dimuat
        if (sidebar.classList.contains("close")) {
            menu.style.display = 'flex'; // Menampilkan menu saat close
            body.querySelector('.name').style.display = 'none'; // Menyembunyikan name saat close
        } else {
            menu.style.display = 'none'; // Menyembunyikan menu saat tidak close
            body.querySelector('.name').style.display = 'flex'; // Menampilkan name saat tidak close
        }

        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            if(sidebar.classList.contains("close")){
                menu.style.display = 'flex'; // Menampilkan menu saat close
                body.querySelector('.name').style.display = 'none'; //Menyembunyikan name saat close
            } else {
                menu.style.display = 'none'; // Menyembunyikan menu saat tidak close
                body.querySelector('.name').style.display = 'flex'; // Menampilkan name saat tidak close
            }
        });

        // modeSwitch.addEventListener("click", () => {
        //     body.classList.toggle("dark")
        //     const homeSection = document.querySelector(".home");
        //     if(body.classList.contains("dark")){
        //         modeText.innerText = "Light Mode";
        //         homeSection.classList.remove("light-mode");
        //         homeSection.classList.add("dark-mode");
        //     } else {
        //         modeText.innerText = "Dark Mode";
        //         homeSection.classList.remove("dark-mode");
        //          homeSection.classList.add("light-mode");

        //     }
        // });
    </script>
</body>
</html>