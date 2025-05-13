@extends('absensi.guru.layout')
@section('guru')
 <h1 class="text-4xl mb-4 dark:text-white">Data Siswa</h1>
 <div class="mb-10 px-20 mx-auto">
  <div class="overflow-x-auto">
    <table class="table">
      <thead>
        <tr>
          <th>No.Card</th>
          <th>Nama<br class="md:hidden"> Siswa</th>
          <th>Alamat</th>
          <th>Jurusan</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)              
        <tr>
          <td>{{ $item->uid }}</td>
          <td>{{ $item->username }}</td>
          <td>{{ $item->kelas }}</td>
          <td>{{ $item->jurusan }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  </div>
@endsection