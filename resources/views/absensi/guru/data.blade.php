@extends('absensi.guru.layout')
@section('guru')
 <h1 class="text-4xl mb-4 dark:text-white">Data Siswa</h1>
 <div class="mb-10 px-20 mx-auto">
    <div class="overflow-x-auto">
      <table class="table-auto w-full text-center">
        <thead>
          <tr class="border-t-2 border border-gray-700 bg-gray-600 text-white thead">
            <th class="border border-gray-700 px-4 py-2">No.Card</th>
            <th class="border border-gray-700 px-4 py-2">Nama Siswa</th>
            <th class="border border-gray-700 px-4 py-2">Alamat</th>
          </tr>
        </thead>
        <tbody class="dark:text-white">
          <tr>
            <td class="border border-gray-700 px-4 py-2">08233</td>
            <td class="border border-gray-700 px-4 py-2">Gilber Hidaya</td>
            <td class="border border-gray-700 px-4 py-2">Puri</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection