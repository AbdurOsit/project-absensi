@extends('absensi.admin2.layout')
@section('admin2')
<div class="bg-gray-100 dark:bg-gray-800 p-4">
  @if (session('sukses'))
    <div class="bg-green-500 text-white p-3 rounded">
      {{ session('sukses') }}
    </div>
  @endif
  <span class="dark:text-white block text-center text-sm">{{ $time }} {{ $date }}</span>

  <div class="container mx-auto py-2">
    <!-- Tabel Absensi Hadir -->
    <div class="mb-10 px-4 sm:px-20 mx-auto">
      <h2 class="text-lg sm:text-xl font-bold mb-4 text-center dark:text-white">Tabel Absensi Siswa Hadir</h2>
      <div class="overflow-x-auto">
        <table class="table-auto w-full text-center text-xs sm:text-sm border border-black dark:border-white">
          <thead>
            <tr class="border-t-4 border border-purple-700 bg-gray-600 text-white">
              <th class="border border-gray-700 px-2 sm:px-4 py-2">No</th>
              <th class="border border-gray-700 px-2 sm:px-4 py-2">Username</th>
              <th class="border border-gray-700 px-2 sm:px-4 py-2">Status</th>
              <th class="border border-gray-700 px-2 sm:px-4 py-2">Waktu Datang</th>
              <th class="border border-gray-700 px-2 sm:px-4 py-2">Waktu Pulang</th>
            </tr>
          </thead>
          {{-- <tbody id="absensiHadirBody"> --}}
          <tbody class="divide-y">
            <?php $no = 1; ?>
            @if($absensihadir->isEmpty())
                <tr class="dark:text-white">
                    <td colspan="5" class="text-center py-1 dark:text-white">Belum ada siswa yang absen</td>
                </tr>
            @else
            @foreach ($absensihadir as $item)
            <tr class="dark:text-white">
              <td class="border border-gray-700 px-2 sm:px-4 py-2">{{ $no }}</td>
              <td class="border border-gray-700 px-2 sm:px-4 py-2">{{ $item->username }}</td>
              <td class="border border-gray-700 px-2 sm:px-4 py-2">
                <button id="statusBtn-{{ $item->uid }}" 
                  onclick="updateStatus('{{ route('updateStatus', $item->uid) }}', '{{ $item->uid }}')" 
                  class="{{ $item->status ? 'bg-green-500' : 'bg-yellow-500' }} p-2 font-bold text-white rounded-lg">
                  {{ $item->status ? 'Disetujui' : 'Pending' }}
                </button>
              </td>
              <td class="border border-gray-700 px-2 sm:px-4 py-2">{{ $item->waktu_datang }}</td>
              <td class="border border-gray-700 px-2 sm:px-4 py-2">{{ $item->waktu_pulang }}</td>
            </tr>
            <?php $no++; ?>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
      <div class="mt-3 relative z-10">
        {{ $absensihadir->appends(['absensihadir' => request('absensihadir'), 'tidakhadir' => request('tidakhadir')])->links('pagination::tailwind') }}
      </div>
    </div>

    <!-- Tabel Absensi Tidak Hadir -->
    <div class="w-full sm:w-3/4 mx-auto">
      <h2 class="text-lg sm:text-xl font-bold mb-4 text-center dark:text-white">Tabel Absensi Siswa Tidak Hadir</h2>
      <div class="overflow-x-auto">
        <table class="table-auto w-full text-center text-xs sm:text-sm border border-black dark:border-white">
          <thead>
            <tr class="border-t-4 border-purple-700 bg-gray-700 text-white">
              <th class="border border-gray-700 px-2 sm:px-4 py-2">No</th>
              <th class="border border-gray-700 px-2 sm:px-4 py-2">Hari/Tanggal</th>
              <th class="border border-gray-700 px-2 sm:px-4 py-2">Username</th>
              <th class="border border-gray-700 px-2 sm:px-4 py-2">Keterangan</th>
            </tr>
          </thead>
          <tbody class="dark:text-white">
            <?php $no = 1; ?>
            @if ($tidakhadir->isEmpty())
            <tr class="dark:text-white">
              <td colspan="4" class="text-center py-1 text-center py-1 dark:text-white">Belum ada data tidak hadir</td>
            </tr>
            @else
            @foreach ($tidakhadir as $item)
            <tr>
              <td class="border border-gray-700 px-2 sm:px-4 py-2">{{ $no }}</td>
              <td class="border border-gray-700 px-2 sm:px-4 py-2">{{ $item->hari }} / {{ Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
              <td class="border border-gray-700 px-2 sm:px-4 py-2">{{ $item->username }}</td>
              <td class="border border-gray-700 px-2 sm:px-4 py-2">{{ $item->alasan }}</td>
            </tr>
            <?php $no++; ?>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
      <div class="mt-3 relative z-20">
        {{ $tidakhadir->appends(['tidakhadir' => request('tidakhadir'), 'absensihadir' => request('absensihadir')])->links('pagination::tailwind') }}
      </div>
    </div>
  </div>
</div>
<script>
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
    // function fetchAbsensiHadir() {
    //   fetch('/absensi-hadir/realtime')
    //     .then(response => response.json())
    //     .then(data => {
    //       const tbody = document.getElementById('absensiHadirBody');
    //       tbody.innerHTML = '';

    //       data.forEach((item, index) => {
    //         const statusColor = item.status ? 'bg-green-500' : 'bg-yellow-500';
    //         const statusText = item.status ? 'Disetujui' : 'Pending';
    //         const row = `
    //           <tr class="dark:text-white">
    //             <td class="border px-2 py-2">${index + 1}</td>
    //             <td class="border px-2 py-2">${item.username}</td>
    //             <td class="border px-2 py-2">
    //               <button id="statusBtn-${item.uid}" 
    //                 onclick="updateStatus('/update-status/${item.uid}', '${item.uid}')" 
    //                 class="${statusColor} p-2 font-bold text-white rounded-lg">
    //                 ${statusText}
    //               </button>
    //             </td>
    //             <td class="border px-2 py-2">${item.waktu_datang ?? '-'}</td>
    //             <td class="border px-2 py-2">${item.waktu_pulang ?? '-'}</td>
    //           </tr>
    //         `;
    //         tbody.innerHTML += row;
    //       });
    //     });
    // }

    // // Jalankan setiap 5 detik
    // setInterval(fetchAbsensiHadir, 5000);
</script>
@endsection