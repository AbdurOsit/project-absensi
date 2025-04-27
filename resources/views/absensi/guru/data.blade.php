@extends('absensi.guru.layout')
@section('guru')
 <h1 class="text-4xl mb-4 dark:text-white">Data Siswa</h1>
 <div class="mb-10 px-20 mx-auto">
  <div class="overflow-x-auto">
    <table class="table-auto w-full text-center text-sm md:text-base">
      <thead>
        <tr class="border-t-2 border border-gray-700 bg-gray-600 text-white thead">
          <th class="border border-gray-700 px-1 py-1 md:px-4 md:py-2">No.Card</th>
          <th class="border border-gray-700 px-1 py-1 md:px-4 md:py-2">Nama<br class="md:hidden"> Siswa</th>
          <th class="border border-gray-700 px-1 py-1 md:px-4 md:py-2">Alamat</th>
          <th class="border border-gray-700 px-1 py-1 md:px-4 md:py-2">Jurusan</th>
        </tr>
      </thead>
      <tbody class="dark:text-white">
        @foreach ($data as $item)              
        <tr>
          <td class="border border-gray-700 px-1 py-1 md:px-4 md:py-2">{{ $item->uid }}</td>
          <td class="border border-gray-700 px-1 py-1 md:px-4 md:py-2">{{ $item->username }}</td>
          <td class="border border-gray-700 px-1 py-1 md:px-4 md:py-2">{{ $item->kelas }}</td>
          <td class="border border-gray-700 px-1 py-1 md:px-4 md:py-2">{{ $item->jurusan }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  </div>
@endsection