@extends('absensi.admin.layout2')
@section('p')
<style>
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

  [data-theme="dark"] table {
        background-color: rgba(55, 65, 81, var(--tw-bg-opacity)); /* Dark table */
  }
  [data-theme="light"] table {
        background-color: rgba(255, 255, 255 var(--tw-bg-opacity)); /* light table */
  }

  [data-theme="light"] .thead {
        background-color: rgba(255, 255, 255, var(--tw-bg-opacity)); /* Dark table */
  }

    [data-theme="light"] .thead {
        background-color: rgb(233, 236, 241, var(--tw-bg-opacity)); /* Light table */
        border: 1px solid black;
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
    {{-- <div class="bg-white rounded-lg shadow-sm p-6">
        <h1 class="text-2xl font-semibold mb-4">Absensi Hadir</h1>
        <table class="table-auto w-full mb-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">RFID</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Waktu Datang</th>
                    <th class="px-4 py-2">Waktu Pulang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensi as $item)    
                <tr>
                    <td class="border px-4 py-2">{{ $item->rfid }}</td>
                    <td class="border px-4 py-2">{{ $item->nama }}</td>
                    <td class="border px-4 py-2">{{ $item->status ? 'Hadir' : 'Tidak Hadir' }}</td>
                    <td class="border px-4 py-2">{{ $item->waktu_datang }}</td>
                    <td class="border px-4 py-2">{{ $item->waktu_pulang }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p class="text-gray-600">Hari, Tanggal: {{ $date }}</p>
    </div> --}}
    <body class="bg-gray-900 text-white dark:text-black">
      {{ $date }}
      <div class="container mx-auto py-10">
          <!-- Tabel pertama -->
          <div class="mb-10 px-20 mx-auto">
            <h2 class="text-xl font-bold mb-4 text-center">Tabel absensi siswa  hadir</h2>
            <div class="overflow-x-auto">
              <table class="table-auto w-full text-center">
                <thead>
                  <tr class="border-t-4 border border-purple-700 bg-gray-600 text-white thead">
                    <th class="border border-gray-700 px-4 py-2">Id</th>
                    <th class="border border-gray-700 px-4 py-2">Absen</th>
                    <th class="border border-gray-700 px-4 py-2">Nama</th>
                    <th class="border border-gray-700 px-4 py-2">Waktu Keterlambatan</th>
                    <th class="border border-gray-700 px-4 py-2">Waktu Pulang</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($absensihadir as $item)    
                  <tr>
                    <td class="border border-gray-700 px-4 py-2">{{ $item->rfid }}</td>
                    <td class="border border-gray-700 px-4 py-2">{{ $item->absen }}</td>
                    <td class="border border-gray-700 px-4 py-2">{{ $item->nama }}</td>
                    <td class="border border-gray-700 px-4 py-2">{{ $item->waktu_datang }}</td>
                    <td class="border border-gray-700 px-4 py-2">{{ $item->waktu_pulang }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
      
          <!-- Tabel kedua -->
          <div class="w-3/4 mx-auto">
            <h2 class="text-xl font-bold mb-4 text-center">Tabel absensi siswa tidak hadir</h2>
            <div class="overflow-x-auto">
              <table class="table-auto w-full text-center">
                <thead>
                  <tr class="border-t-4 border-purple-700 bg-gray-700 text-white thead">
                    <th class="border border-gray-700 px-4 py-2">Hari/Tanggal</th>
                    <th class="border border-gray-700 px-4 py-2">Id</th>
                    <th class="border border-gray-700 px-4 py-2">Absen</th>
                    <th class="border border-gray-700 px-4 py-2">Nama</th>
                    <th class="border border-gray-700 px-4 py-2">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tidakhadir as $item)
                  <tr>
                    <td class="border border-gray-700 px-4 py-2">{{ $item->rfid }}</td>
                    <td class="border border-gray-700 px-4 py-2">{{ $item->absen }}</td>
                    <td class="border border-gray-700 px-4 py-2">{{ $item->nama }}</td>
                    <td class="border border-gray-700 px-4 py-2">{{ $item->keterangan }}</td>
                    <td class="border border-gray-700 px-4 py-2">{{ $date }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </body>
@endsection
