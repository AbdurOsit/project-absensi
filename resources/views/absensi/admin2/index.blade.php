@extends('absensi.admin2.layout')
@section('admin2')
<div class="bg-gray-100 dark:bg-gray-800">
  @if (session('sukses'))
                <div class="bg-green-500 text-white p-3 rounded">
                    {{ session('sukses') }}
                </div>
            @endif
  <span class="dark:text-white p-5">{{ $time }} {{ $date }}</span>


  <div class="container mx-auto py-6">
    <!-- Tabel pertama -->
    <div class="mb-10 px-20 mx-auto">
      <h2 class="text-xl font-bold mb-4 text-center dark:text-white">Tabel absensi siswa hadir</h2>
      <div class="overflow-x-auto">
        <table class="table-auto w-full text-center">
          <thead>
            <tr class="border-t-4 border border-purple-700 bg-gray-600 text-white thead">
              <th class="border border-gray-700 px-4 py-2">No</th>
              <th class="border border-gray-700 px-4 py-2">Username</th>
              <th class="border border-gray-700 px-4 py-2">Status</th>
              <th class="border border-gray-700 px-4 py-2">Waktu Datang</th>
              <th class="border border-gray-700 px-4 py-2">Waktu Pulang</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach ($absensihadir as $item)
            <tr class="dark:text-white">
              <td class="border border-gray-700 px-4 py-2">{{ $no }}</td>
              <td class="border border-gray-700 px-4 py-2">{{ $item->username }}</td>

              <td class="border border-gray-700 px-4 py-2 p-5">

                <button id="statusBtn-{{ $item->uid }}" 
                  onclick="updateStatus('{{ route('updateStatus', $item->uid) }}', '{{ $item->uid }}')" 
                  class="{{ $item->status ? 'bg-green-500' : 'bg-yellow-500' }} p-2 font-bold text-white rounded-lg">
                  {{ $item->status ? 'Disetujui' : 'Pending' }}
                </button>

              </td>
              <td class="border border-gray-700 px-4 py-2">{{ $item->waktu_datang }}</td>
              <td class="border border-gray-700 px-4 py-2">{{ $item->waktu_pulang }}</td>
            </tr>
            
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $absensihadir->links('pagination::tailwind') }}
    </div>

    <!-- Tabel kedua -->
    <div class="w-3/4 mx-auto">
      <h2 class="text-xl font-bold mb-4 text-center dark:text-white">Tabel absensi siswa tidak hadir</h2>
      <div class="overflow-x-auto">
        <table class="table-auto w-full text-center">
          <thead>
            <tr class="border-t-4 border-purple-700 bg-gray-700 text-white thead">
              <th class="border border-gray-700 px-4 py-2">No</th>
              <th class="border border-gray-700 px-4 py-2">Hari/Tanggal</th>
              <th class="border border-gray-700 px-4 py-2">username</th>
              <th class="border border-gray-700 px-4 py-2">Keterangan</th>
            </tr>
          </thead>
          <tbody class="dark:text-white">
            <?php $no = 1; ?>
            @foreach ($tidakhadir as $item)
            <tr>
              <td class="border border-gray-700 px-4 py-2">{{ $no }}</td>
              <td class="border border-gray-700 px-4 py-2">{{ $item->hari }} /{{ $item->tanggal }}</td>
              <td class="border border-gray-700 px-4 py-2">{{ $item->username }}</td>
              <td class="border border-gray-700 px-4 py-2">{{ $item->alasan }}</td>
            </tr>
            <?php $no++; ?>
            @endforeach
          </tbody>
        </table>
        <br>
      {{ $tidakhadir->links('pagination::tailwind') }}
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
</script>
@endsection