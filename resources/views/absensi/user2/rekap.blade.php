@extends('absensi.user2.layout')
@section('user2')
<div class="transition-all duration-100 p-6">
    <div class="p-2 font-sans">
      <!-- Header -->
      <div class="mb-4">
        <h1 class="text-xl font-bold" id="header1">Hi, Stewie Griffin</h1>
      </div>
    
      <!-- Profile Card -->
      <div class="w-full mx-6 bg-gray-800 p-6 rounded-lg flex items-center gap-4 text-white" id="profile">
        <img
          src="https://www.jokesforfunny.com/wp-content/uploads/2021/06/0596bdb89b60fe771acd2f5972a9d3e3-905x1200.jpg"
          alt="Profile Picture"
          class="rounded-full w-44 h-44"
        />
        <div>
          <p><strong>Nama:</strong> Stewie Griffin</p>
          <p><strong>Absen:</strong> 34</p>
          <p><strong>Alamat:</strong> Quahog</p>
          <p><strong>Tempat/Tanggal Lahir:</strong> Afganistan/17 November 1998</p>
        </div>
      </div>
    
      <!-- Rekap Absensi -->
      <div class="mx-6 mt-6">
        <h2 class="text-lg font-bold" id="header2">Rekap Absensi</h2>
        <div class="flex gap-4 mt-4 text-white">
          <!-- Bulan Dropdown -->
          <div>
            <label for="bulan" class="sr-only">Bulan</label>
            <select
              id="bulan"
              class="bg-gray-800 text-white border border-gray-700 rounded-md p-2"
            >
              <option>Januari</option>
              <option>Februari</option>
              <option>Maret</option>
              <option>April</option>
              <!-- Tambahkan opsi lainnya -->
            </select>
          </div>
          <!-- Kelas Dropdown -->
          <div>
            <label for="kelas" class="sr-only">Kelas</label>
            <select
              id="kelas"
              class="bg-gray-800 text-white border border-gray-700 rounded-md p-2"
            >
              <option>12</option>
              <option>11</option>
              <option>10</option>
            </select>
          </div>
        </div>
      </div>
    
      <!-- Table -->
      <div class="mx-6 mt-4 text-white">
        <table class="w-full text-left bg-gray-800 rounded-lg border-collapse border border-gray-700">
          <thead>
            <tr>
              <th class="border border-gray-700 px-4 py-2">Tanggal</th>
              <th class="border border-gray-700 px-4 py-2">Jam Kedatangan</th>
              <th class="border border-gray-700 px-4 py-2">Jam Pulang</th>
              <th class="border border-gray-700 px-4 py-2">Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="border border-gray-700 px-4 py-2">-</td>
              <td class="border border-gray-700 px-4 py-2">-</td>
              <td class="border border-gray-700 px-4 py-2">-</td>
              <td class="border border-gray-700 px-4 py-2">-</td>
            </tr>
            <!-- Tambahkan baris lainnya jika diperlukan -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection