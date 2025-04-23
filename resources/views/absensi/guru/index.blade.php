@extends('absensi.guru.layout')
@section('guru')
    <div class="bg-gray-100 dark:bg-gray-800 text-center">
        @if (session('sukses'))
            <div class="bg-green-500 text-white p-3 rounded">
                {{ session('sukses') }}
            </div>
        @endif
        <span class="dark:text-white">{{ $time }} {{ $date }}</span>
        <div class="container mx-auto py-6">
            <!-- Tabel pertama -->
            <div class="mb-10 px-20 mx-auto">
                <h2 class="text-xl font-bold mb-4 text-center dark:text-white">Tabel absensi siswa hadir</h2>
                <div class="overflow-x-auto">
                    <table class="table-auto w-full text-center border border-black dark:border-white">
                        <thead>
                            <tr class="border-t-4 border border-purple-700 bg-gray-600 text-white thead">
                                <th class="border border-gray-700 px-4 py-2">No</th>
                                <th class="border border-gray-700 px-4 py-2">Absen</th>
                                <th class="border border-gray-700 px-4 py-2">Nama</th>
                                <th class="border border-gray-700 px-4 py-2">Waktu Keterlambatan</th>
                                <th class="border border-gray-700 px-4 py-2">Waktu Pulang</th>
                            </tr>
                        </thead>
                        {{-- <tbody id="absensiHadirBody"> --}}
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @if ($absensihadir->isEmpty())
                                <tr class="dark:text-white">
                                    <td colspan="6" class="text-center py-1 dark:text-white">Belum ada siswa yang absen</td>
                                </tr>
                            @endif
                            @foreach ($absensihadir as $item)
                                <tr class="dark:text-white">
                                    <td class="border border-gray-700 px-4 py-2">{{ $no }}</td>
                                    <td class="border border-gray-700 px-4 py-2">{{ $item->uid }}</td>
                                    <td class="border border-gray-700 px-4 py-2">{{ $item->username }}</td>
                                    <td class="border border-gray-700 px-4 py-2">{{ $item->waktu_datang }}</td>
                                    <td class="border border-gray-700 px-4 py-2">{{ $item->waktu_pulang }}</td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tabel kedua -->
            <div class="w-3/4 mx-auto">
                <h2 class="text-xl font-bold mb-4 text-center dark:text-white">Tabel absensi siswa tidak hadir</h2>
                <div class="overflow-x-auto">
                    <table class="table-auto w-full text-center border border-black dark:border-white">
                        <thead>
                            <tr class="border-t-4 border-purple-700 bg-gray-700 text-white thead">
                                <th class="border border-gray-700 px-4 py-2">No</th>
                                <th class="border border-gray-700 px-4 py-2">Username</th>
                                <th class="border border-gray-700 px-4 py-2">Kelas</th>
                                <th class="border border-gray-700 px-4 py-2">Jurusan</th>
                                <th class="border border-gray-700 px-4 py-2">Keterangan</th>
                                <th class="border border-gray-700 px-4 py-2">Hari Tidak Masuk</th>
                            </tr>
                        </thead>
                        {{-- <tbody class="dark:text-white" id="tidakHadirRealtimeBody"> --}}
                        <tbody class="dark:text-white">
                            @php
                                $no = 1;
                            @endphp
                            @if ($tidakhadir->isEmpty())
                                <tr class="dark:text-white">
                                    <td colspan="6" class="text-center py-1 dark:text-white">Belum ada data tidak hadir</td>
                                </tr>
                            @else
                            @foreach ($tidakhadir as $item)
                                <tr>
                                    <td class="border border-gray-700 px-4 py-2">{{ $no }}</td>
                                    <td class="border border-gray-700 px-4 py-2">{{ $item->username }}</td>
                                    <td class="border border-gray-700 px-4 py-2">{{ $item->kelas }}</td>
                                    <td class="border border-gray-700 px-4 py-2">{{ $item->jurusan }}</td>
                                    <td class="border border-gray-700 px-4 py-2">{{ $item->alasan }}</td>
                                    <td class="border border-gray-700 px-4 py-2">{{ $item->hari }} / {{ Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        // function fetchAbsensiHadir() {
        //     fetch('/absensi-hadir/realtime')
        //         .then(response => response.json())
        //         .then(data => {
        //             const tbody = document.getElementById('absensiHadirBody');
        //             tbody.innerHTML = '';

        //             data.forEach((item, index) => {
        //                 const statusColor = item.status ? 'bg-green-500' : 'bg-yellow-500';
        //                 const statusText = item.status ? 'Disetujui' : 'Pending';
        //                 const row = `
        //       <tr class="dark:text-white">
        //         <td class="border px-2 py-2">${index + 1}</td>
        //         <td class="border px-2 py-2">${item.username}</td>
        //         <td class="border px-2 py-2">${item.waktu_datang ?? '-'}</td>
        //         <td class="border px-2 py-2">${item.waktu_pulang ?? '-'}</td>
        //       </tr>
        //     `;
        //                 tbody.innerHTML += row;
        //             });
        //         });
        // }

        // // Jalankan setiap 5 detik
        // setInterval(fetchAbsensiHadir, 5000);

        // function fetchTidakHadir() {
        //     fetch('/guru/tidakhadir/realtime')
        //         .then(res => res.json())
        //         .then(data => {
        //             const tbody = document.getElementById('tidakHadirRealtimeBody');
        //             tbody.innerHTML = '';
        //             let no = 1;

        //             data.forEach(item => {
        //                 const row = `
        //             <tr>
        //                 <td class="border border-gray-700 px-4 py-2">${no}</td>
        //                 <td class="border border-gray-700 px-4 py-2">${item.username}</td>
        //                 <td class="border border-gray-700 px-4 py-2">${item.kelas}</td>
        //                 <td class="border border-gray-700 px-4 py-2">${item.jurusan}</td>
        //                 <td class="border border-gray-700 px-4 py-2">${item.alasan}</td>
        //                 <td class="border border-gray-700 px-4 py-2">${formatTanggal(item.hari_tanggal)}</td>
        //             </tr>
        //         `;
        //                 tbody.innerHTML += row;
        //                 no++;
        //             });
        //         });
        // }

        // Format tanggal seperti "Jumat, 11 April 2025"
        function formatTanggal(tgl) {
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            return new Date(tgl).toLocaleDateString('id-ID', options);
        }

        // // Jalankan setiap 3 detik
        // setInterval(fetchTidakHadir, 3000);
    </script>
@endsection
