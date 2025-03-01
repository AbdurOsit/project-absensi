<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Base transitions for all theme changes */
    body {
      background-color: #ffffff;
      color: rgb(32, 31, 31);
      transition: all 0.5s ease;
    }
    
    /* Dark theme styles with transitions */
    body.dark {
      background-color: #2d2d2d;
      color: white;
      transition: all 0.5s ease;
    }

    /* Dashboard heading styles */
    .dashboard-heading {
      color: #000000; /* Black color for light theme */
      transition: all 0.5s ease;
    }

    .dark .dashboard-heading {
      color: #ffffff; /* White color for dark theme */
      transition: all 0.5s ease;
    }
    
    /* Consistent transitions for all elements */
    .bg-gray-100,
    .bg-white,
    .text-gray-600,
    .text-black,
    .border-black,
    .search-icon {
      transition: all 0.5s ease;
    }
    
    /* Dark theme overrides with the same transition timing */
    .dark .bg-gray-100 {
      background-color: #1a1a1a;
      transition: all 0.5s ease;
    }
    
    .dark .text-gray-600 {
      color: #b0b0b0;
      transition: all 0.5s ease;
    }
    
    .dark .bg-white {
      background-color: #333;
      transition: all 0.5s ease;
    }
    
    .dark .border-black {
      border-color: #444;
      transition: all 0.5s ease;
    }
    
    .dark .text-black {
      color: #b0b0b0;
      transition: all 0.5s ease;
    }
    
    .dark .search-icon {
      color: #b0b0b0;
      transition: all 0.5s ease;
    }

    /* Sidebar transition */
    .sidebar-transition {
      transition: width 0.3s ease;
    }
  </style>
  
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
  <div class="flex h-screen">
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar-transition bg-purple-600 text-white h-screen w-16 flex flex-col flex-shrink-0">
      <div class="p-4 flex items-center justify-center">
        <button id="openBtn" class="mx-auto p-2 bg-purple-600 border border-none hover:bg-purple-700 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="7" height="7"></rect>
            <rect x="14" y="3" width="7" height="7"></rect>
            <rect x="14" y="14" width="7" height="7"></rect>
            <rect x="3" y="14" width="7" height="7"></rect>
          </svg>
        </button>
        
        <div id="headerOpen" class="hidden w-full">
          <div class="flex items-center justify-between">
            <span class="font-semibold text-3xl text-center"><span class="text-yellow-300">A</span>bsensi</span>
            <button id="closeBtn" class="p-2 hover:bg-purple-700 rounded-lg ml-16">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m15 18-6-6 6-6"/>
            </svg>
          </button>
          </div>
          
        </div>
      </div>

      <div class="flex-1">
        <a href="{{ route('absensi.index')}}">
          <div class="menu-item flex items-center p-4 hover:bg-purple-700 cursor-pointer">
          {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 20h9"/>
            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/>
          </svg>
          <span class="ml-4 hidden menu-text">Input Data</span> --}}
          
            <i class='bx bxs-home icon text-xl' style="color:{{ ($title == 'index') ? 'black' : '' }}"></i>
            <span class=" hidden menu-text ml-4" style="color:{{ ($title == 'index') ? 'black' : '' }}">Home</span>
          </div>
        </a>

        <a href="{{ route('absensi.input')}}">
          <div class="menu-item flex items-center p-4 hover:bg-purple-700 cursor-pointer">
          {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 20h9"/>
            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/>
          </svg>
          <span class="ml-4 hidden menu-text">Input Data</span> --}}
          
            <i class='bx bxs-pencil icon text-xl' style="color:{{ ($title == 'input') ? 'black' : '' }}"></i>
            <span class=" hidden menu-text ml-4" style="color:{{ ($title == 'input') ? 'black' : '' }}">Input Data</span>
          </div>
        </a>

        <!-- More menu items here... -->
        
        <a href="{{ route('absensi.data') }}">
          <div class="menu-item flex items-center p-4 hover:bg-purple-700 cursor-pointer">
          {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
            <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
          </svg>
          <span class="ml-4 hidden menu-text">Data Siswa</span> --}}
              <i class='bx bx-layer icon text-xl' style="color:{{ ($title == 'data') ? 'black' : '' }}"></i>
              <span class=" hidden menu-text ml-4" style="color:{{ ($title == 'data') ? 'black' : '' }}">Data Siswa</span>
            </div>
          </a>
        
        <a href="{{ route('absensi.rekap') }}">
          <div class="menu-item flex items-center p-4 hover:bg-purple-700 cursor-pointer">
          {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2v6h6"/>
            <path d="M4 6v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6H6a2 2 0 0 0-2 2z"/>
            <path d="M8 12v4"/>
            <path d="M12 12v4"/>
            <path d="M16 12v4"/>
          </svg>
          <span class="ml-4 hidden menu-text">Rekapitulasi Absensi</span> --}}
            {{-- <i class='bx bxs-grid-alt icon text-xl' style="color:{{ ($title == 'rekap') ? 'black' : '' }}"></i> --}}
            <i class='bx bx-grid-vertical text-2xl' style="color:{{ ($title == 'rekap') ? 'black' : '' }}"></i>
            <span class=" hidden menu-text ml-4" style="color:{{ ($title == 'rekap') ? 'black' : '' }}">Rekapitulasi Absensi</span>
          </div>
        </a>
        
        <a href="{{ route('absensi.scan') }}">
          <div class="menu-item flex items-center p-4 hover:bg-purple-700 cursor-pointer">
          {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect width="20" height="14" x="2" y="5" rx="2"/>
            <line x1="2" x2="22" y1="10" y2="10"/>
          </svg>
          <span class="ml-4 hidden menu-text">Scan Card</span> --}}
            <i class='bx bxs-id-card icon text-xl' style="color:{{ ($title == 'scan') ? 'black' : '' }}"></i>
            <span class=" hidden menu-text ml-4" style="color:{{ ($title == 'scan') ? 'black' : '' }}">Scan Card</span>
          </div>
        </a>
        
        <a href="{{ route('absensi.surat') }}">
          <div class="menu-item flex items-center p-4 hover:bg-purple-700 cursor-pointer">
          {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2v6h6"/>
            <path d="M4 6v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6H6a2 2 0 0 0-2 2z"/>
            <path d="M8 13h8"/>
            <path d="M8 17h8"/>
            <path d="M8 9h2"/>
          </svg>
          <span class="ml-4 hidden menu-text">Input Surat</span> --}}
          
            <i class='fas fa-file-alt icon text-xl' style="color:{{ ($title == 'surat') ? 'black' : '' }}"></i>
            <span class=" hidden menu-text ml-4" style="color:{{ ($title == 'surat') ? 'black' : '' }}">Input Surat</span>
          </div>
        </a>
        

        <div class="mt-28">
          <div class="menu-item flex items-center p-4 hover:bg-purple-700 cursor-pointer">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
              <polyline points="16 17 21 12 16 7"/>
              <line x1="21" x2="9" y1="12" y2="12"/>
            </svg>
            <span class="ml-4 hidden menu-text">Keluar</span> --}}
            <a href="#">
              <i class='bx bx-log-out icon text-xl' ></i>
              <span class=" hidden menu-text ml-4">Log Out</span>
          </a>
          </div>
          
          <div class="menu-item flex items-center p-4 hover:bg-purple-700 cursor-pointer">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
              <polyline points="16 17 21 12 16 7"/>
              <line x1="21" x2="9" y1="12" y2="12"/>
            </svg> --}}
            {{-- <i class='fas fa-gear' style='font-size:24px; fill: none'></i>--}}
            <i class='bx bx-cog text-2xl'></i>
            <span class="ml-4 hidden menu-text">Pengaturan</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="w-full p-8 bg-gray-100">
      <div class="flex justify-between items-center mb-8">
        @if ($title == 'rekap')
        <h1 class="ml-5">Absensi || Dashboard</h1>
        @else
        <h1></h1>
        @endif
        <div class="flex justify-end items-center space-x-4">
          <div class="relative w-64 mr-4">
            <input 
              type="text"
              placeholder="search.."
              class="w-full pl-8 pr-4 py-2 rounded-md focus:outline-none bg-white border-2 border-black dark:bg-white dark:border-black dark:text-black text-black focus:ring-2 focus:ring-gray-600"
            />
            <svg
              class="w-4 h-4 absolute left-2.5 top-3 text-gray-400 search-icon dark:text-black"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
          </div>

          <!-- Notification Bell -->
          <button class="notif text-dark dark:text-dark" title="Notification">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
          </button>

          <!-- Mode Sun/Moon -->
          <button onclick="toggleTheme()" class="text-gray-400 border border-none" title="Toggle Mode">
            <!-- Sun Icon (Hidden when Dark Mode) -->
            <svg class="w-6 h-6 text-white sun hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>

            <!-- Moon Icon (Hidden when Light Mode) -->
            <svg class="w-6 h-6 text-black moon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
            </svg>
          </button>

          <i class='bx bx-user-circle text-5xl text-dark dark:text-dark'></i>
        </div>
      </div>

      {{-- <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
      <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Selamat Datang</h2>
        <p class="text-gray-600">Ini adalah halaman konten utama. Anda dapat menambahkan konten apapun di sini.</p>
      </div> --}}
      @yield('p')
    </div>
  </div>

  <script>
    // Get DOM elements
    const sidebar = document.getElementById('sidebar');
    const openBtn = document.getElementById('openBtn');
    const closeBtn = document.getElementById('closeBtn');
    const headerOpen = document.getElementById('headerOpen');
    const menuTexts = document.querySelectorAll('.menu-text');
    
    // Function to open sidebar
    function openSidebar() {
      sidebar.classList.remove('w-16');
      sidebar.classList.add('w-64');
      openBtn.classList.add('hidden');
      headerOpen.classList.remove('hidden');
      menuTexts.forEach(text => text.classList.remove('hidden'));
    }
    
    // Function to close sidebar
    function closeSidebar() {
      sidebar.classList.remove('w-64');
      sidebar.classList.add('w-16');
      openBtn.classList.remove('hidden');
      headerOpen.classList.add('hidden');
      menuTexts.forEach(text => text.classList.add('hidden'));
    }
    
    // Add event listeners
    openBtn.addEventListener('click', openSidebar);
    closeBtn.addEventListener('click', closeSidebar);

    // Function to toggle theme
    function toggleTheme() {
      const body = document.body;
      const sunIcon = document.querySelector('.sun');
      const moonIcon = document.querySelector('.moon');

      // Toggle dark and light theme
      body.classList.toggle('dark');
      
      // Toggle visibility of sun and moon icons
      if (body.classList.contains('dark')) {
        sunIcon.classList.remove('hidden');
        moonIcon.classList.add('hidden');
      } else {
        sunIcon.classList.add('hidden');
        moonIcon.classList.remove('hidden');
      }
    }
  </script> 
</body>
</html>
