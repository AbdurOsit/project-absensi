@extends('absensi.guru.layout')
@section('guru')
    <div class="bg-gray-100 dark:bg-slate-800 text-center p-2">
        @if (session('sukses'))
            <div class="bg-green-500 text-white p-3 rounded mb-2">
                {{ session('sukses') }}
            </div>
        @endif
        <span class="dark:text-white text-sm">{{ $time }} {{ $date }}</span>
        <div class="container mx-auto py-3">
            <!-- Tabel pertama -->
            <div class="mb-6 px-2 md:px-20 mx-auto">
                <h2 class="text-lg md:text-xl font-bold mb-2 text-center dark:text-white">Tabel absensi siswa hadir</h2>
                <div class="overflow-x-auto">
                    <table class="table-auto w-full text-center border border-black dark:border-white text-sm">
                        <thead>
                            <tr class="border-t-2 border border-purple-700 bg-gray-300 dark:bg-gray-800 dark:text-white thead">
                                <th class="border border-gray-700 px-1 py-1">No</th>
                                <th class="border border-gray-700 px-1 py-1">Absen</th>
                                <th class="border border-gray-700 px-1 py-1">Nama</th>
                                <th class="border border-gray-700 px-1 py-1">Status</th>
                                <th class="border border-gray-700 px-1 py-1">Waktu<br>Datang</th>
                                <th class="border border-gray-700 px-1 py-1">Waktu<br>Pulang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @if ($absensihadir->isEmpty())
                                <tr class="dark:text-white">
                                    <td colspan="5" class="text-center py-1 dark:text-white">Belum ada siswa yang absen
                                    </td>
                                </tr>
                            @endif
                            @foreach ($absensihadir as $item)
                                <tr class="dark:text-white">
                                    <td class="border border-gray-700 px-1 py-1">{{ $no }}</td>
                                    <td class="border border-gray-700 px-1 py-1">{{ $item->uid }}</td>
                                    <td class="border border-gray-700 px-1 py-1">{{ $item->username }}</td>
                                    <td class="border border-gray-700 px-1 py-1">
                                        <button id="statusBtn-{{ $item->uid }}" 
                                        onclick="updateStatus('{{ route('updateStatus', $item->uid) }}', '{{ $item->uid }}')" 
                                        class="{{ $item->status ? 'bg-green-500' : 'bg-yellow-500' }} p-2 font-bold text-white rounded-lg">
                                        {{ $item->status ? 'Disetujui' : 'Pending' }}
                                        </button>
                                    </td>
                                    <td class="border border-gray-700 px-1 py-1">{{ $item->waktu_datang }}</td>
                                    <td class="border border-gray-700 px-1 py-1">{{ $item->waktu_pulang }}</td>
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
            <div class="w-full px-2 md:w-3/4 mx-auto">
                <h2 class="text-lg md:text-xl font-bold mb-2 text-center dark:text-white">Tabel absensi siswa tidak hadir
                </h2>
                <div class="overflow-x-auto">
                    <table class="table-auto w-full text-center border border-black dark:border-white text-sm">
                        <thead>
                            <tr class="border-t-2 border-purple-700 bg-gray-300 dark:bg-gray-800 dark:text-white thead">
                                <th class="border border-gray-700 px-1 py-1">No</th>
                                <th class="border border-gray-700 px-1 py-1">Username</th>
                                <th class="border border-gray-700 px-1 py-1">Kelas</th>
                                <th class="border border-gray-700 px-1 py-1">Jurusan</th>
                                <th class="border border-gray-700 px-1 py-1">Keterangan</th>
                                <th class="border border-gray-700 px-1 py-1">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="dark:text-white">
                            @php
                                $no = 1;
                            @endphp
                            @if ($tidakhadir->isEmpty())
                                <tr class="dark:text-white">
                                    <td colspan="6" class="text-center py-1 dark:text-white">Belum ada data tidak hadir
                                    </td>
                                </tr>
                            @else
                                @foreach ($tidakhadir as $item)
                                    <tr>
                                        <td class="border border-gray-700 px-1 py-1">{{ $no }}</td>
                                        <td class="border border-gray-700 px-1 py-1">{{ $item->username }}</td>
                                        <td class="border border-gray-700 px-1 py-1">{{ $item->kelas }}</td>
                                        <td class="border border-gray-700 px-1 py-1">{{ $item->jurusan }}</td>
                                        <td class="border border-gray-700 px-1 py-1">{{ $item->alasan }}</td>
                                        <td class="border border-gray-700 px-1 py-1">
                                            {{ $item->hari }}<br>{{ Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                                        </td>
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

        function updateStatus(url, uid) {
      fetch(url, {
          method: 'PUT',
          headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}',
              'Content-Type': 'application/json',
          },
          body: JSON.stringify({})
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              let btn = document.getElementById('statusBtn-' + uid);
              btn.textContent = data.status ? 'Disetujui' : 'Pending';
              btn.className = data.status ? 'bg-green-500 p-2 font-bold text-white rounded-lg' 
                                          : 'bg-yellow-500 p-2 font-bold text-white rounded-lg';
          }
      })
      .catch(error => console.error('Error:', error));
  }
        // // Jalankan setiap 3 detik
        // setInterval(fetchTidakHadir, 3000);
    </script>
@endsection
