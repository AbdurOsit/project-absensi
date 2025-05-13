@extends('absensi.admin2.layout')
@section('admin2')
 <h1 class="text-4xl mb-4 dark:text-white">Data Siswa</h1>
 <div class="w-full mb-10 px-10 mx-auto">
    <div class="overflow-x-auto">
      <table class="table">
        <thead>
          <tr >
            <th>No.Card</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Jurusan</th>
          </tr>
        </thead>
        <tbody class="dark:text-white">
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