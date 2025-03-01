@extends('absensi.admin.layout2')
@section('p')
    <style>
        [data-theme="dark"] {
            
            --border-color: rgba(75, 85, 99, 1);
        }

        [data-theme="light"] {
            --bg-color: rgba(255, 255, 255, 1);
            --text-color: rgba(255, 255, 255, 1);
            --table-bg: rgba(217, 221, 228, 1);
            --border-color: rgba(200, 200, 200, 1);
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        select{
            background-color: var(--bg-color);
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }
        table {
            background-color: var(--table-bg);
        }
        h1{
            color: var(--text-color);
        }
        th,
        td {
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }

        input {
            background-color: var(--bg-color);
            color: var(--text-color);
            border: 2px solid var(--border-color);
        }

        button {
            background-color: var(--bg-color);
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }
    </style>

<div class="min-h-screen p-6">

    <!-- Header Controls -->
    <div class="flex items-center gap-4 mb-6">
        <!-- Search Box -->
        <div class="relative">
            <input 
                type="text" 
                placeholder="Cari siswa" 
                class="rounded px-3 py-2 w-48 text-sm focus:outline-none"
            >
            <button class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-400 border border-none">
                ✕
            </button>
        </div>

        <!-- Dropdown -->
        <select class="rounded px-3 py-2 text-sm focus:outline-none">
            <option>Nama Siswa A-Z</option>
        </select>

        <!-- Add Student Button -->
        <button class="flex items-center gap-2 border border-none">
            <span class="w-6 h-6 bg-purple-500 rounded-full flex items-center justify-center text-white text-sm">
                +
            </span>
            <span class="text-sm">Tambah Siswa</span>
        </button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-3 text-sm font-normal">No</th>
                    <th class="px-4 py-3 text-sm font-normal">Absen</th>
                    <th class="px-4 py-3 text-sm font-normal">Nama</th>
                    <th class="px-4 py-3 text-sm font-normal">Waktu Keterlambatan</th>
                    <th class="px-4 py-3 text-sm font-normal">Waktu Pulang</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <tr>
                    <td class="px-4 py-3 text-sm font-normal">1</td>
                    <td class="px-4 py-3 text-sm font-normal">01</td>
                    <td class="px-4 py-3 text-sm font-normal">Gilbert Hidaya</td>
                    <td class="px-4 py-3 text-sm font-normal">10.00</td>
                    <td class="px-4 py-3 text-sm font-normal">11.00</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const rootElement = document.documentElement; // Menggunakan elemen HTML sebagai root

        // Ambil tema dari localStorage
        const currentTheme = localStorage.getItem('theme') || 'dark';
        rootElement.setAttribute('data-theme', currentTheme);

        // Perbarui teks tombol
        themeToggle.textContent = currentTheme === 'dark' ? 'Switch to Light' : 'Switch to Dark';

        themeToggle.addEventListener('click', () => {
            const newTheme = rootElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            rootElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);

            // Perbarui teks tombol
            themeToggle.textContent = newTheme === 'dark' ? 'Switch to Light' : 'Switch to Dark';
        });
    </script>

@endsection
