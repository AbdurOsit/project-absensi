@extends('absensi.guru.layout')
@section('guru')

<div class="p-6">
    <!-- Header Controls -->
    <div class="flex items-center gap-4 mb-6">
        <!-- Search Box -->
        <div class="relative ">
            <input type="text" placeholder="Cari siswa" class="border border-black dark:border-none rounded-xl dark:text-white dark:bg-gray-800 px-3 py-2 w-48 text-sm focus:outline-none">
            <button
                class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 dark:text-white hover:text-gray-400 border border-none">
                ✕
            </button>
        </div>

        <!-- Dropdown -->
        <select class="rounded px-7 py-2 text-sm flex focus:outline-none dark:bg-gray-800 dark:text-white rounded-xl">
            <option>Nama Siswa A-Z</option>
            <option>Nama Siswa Z-A</option>
        </select>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full border border-black dark:border-white">
            <thead>
                <tr class="dark:text-white">
                    <th class="px-1 py-3 text-sm font-normal border border-black dark:border-white">No</th>
                    <th class="px-1 py-3 text-sm font-normal border border-black dark:border-white">Username</th>
                    <th class="px-1 py-3 text-sm font-normal border border-black dark:border-white">Kelas</th>
                    <th class="px-1 py-3 text-sm font-normal border border-black dark:border-white">Jurusan</th>
                    <th class="px-1 py-3 text-sm font-normal border border-black dark:border-white">Waktu Datang</th>
                    <th class="px-1 py-3 text-sm font-normal border border-black dark:border-white">Waktu Pulang</th>
                </tr>
            </thead>
            <tbody class="divide-y" id="rekapRealtimeBody">
                @php $no = 1; @endphp
                @if($data->isEmpty())
                    <tr class="dark:text-white">
                        <td colspan="6" class="text-center py-1 text-center py-1 dark:text-white">Belum ada siswa yang absen</td>
                    </tr>
                @else
                @foreach ($data as $item)
                <tr class="dark:text-white text-center">
                    <td class="px-1 py-3 text-sm font-normal border border-black dark:border-white">{{ $no }}</td>
                    <td class="px-1 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->username }}</td>
                    <td class="px-1 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->kelas }}</td>
                    <td class="px-1 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->jurusan }}</td>
                    <td class="px-1 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->waktu_datang }}</td>
                    <td class="px-1 py-3 text-sm font-normal border border-black dark:border-white">{{ $item->waktu_pulang }}</td>
                </tr>
                @php $no++; @endphp
                @endforeach
                @endif
            </tbody>
        </table>
    </div>    
    <script>
        function fetchRekapRealtime() {
    fetch('/guru/rekap/realtime')
        .then(res => res.json())
        .then(data => {
            const tbody = document.getElementById('rekapRealtimeBody');
            tbody.innerHTML = '';

            if (data.length === 0) {
                tbody.innerHTML = `
                    <tr class="dark:text-white">
                        <td colspan="6" class="text-center py-1 dark:text-white">Belum ada siswa yang absen</td>
                    </tr>
                `;
                return;
            }

            let no = 1;
            data.forEach(item => {
                const row = `
                    <tr class="dark:text-white text-center">
                        <td class="px-1 py-3 text-sm font-normal border border-black dark:border-white">${no}</td>
                        <td class="px-1 py-3 text-sm font-normal border border-black dark:border-white">${item.username}</td>
                        <td class="px-1 py-3 text-sm font-normal border border-black dark:border-white">${item.kelas}</td>
                        <td class="px-1 py-3 text-sm font-normal border border-black dark:border-white">${item.jurusan}</td>
                        <td class="px-1 py-3 text-sm font-normal border border-black dark:border-white">${item.waktu_datang ?? '-'}</td>
                        <td class="px-1 py-3 text-sm font-normal border border-black dark:border-white">${item.waktu_pulang ?? '-'}</td>
                    </tr>
                `;
                tbody.innerHTML += row;
                no++;
            });
        });
}

// Jalankan setiap 3 detik
setInterval(fetchRekapRealtime, 3000);
    </script>
@endsection