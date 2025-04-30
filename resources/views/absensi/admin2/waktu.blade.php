@extends('absensi.admin2.layout')
@section('admin2')
    @if (session('sukses'))
        <div class="bg-green-500 text-white p-3 rounded">
            {{ session('sukses') }}
        </div>
    @endif
    
    <!-- Main Title -->
    <h1 class="text-2xl font-semibold mb-8 dark:text-white">Waktu Masuk dan Pulang</h1>
    {{-- <a href="{{ route('waktu.create') }}" class="bg-purple-600 p-3 rounded-xl text-white font-bold button"><button>Create</button></a> --}}
    <!-- Data Grid -->
    <div class="w-3/4 mt-6">

        {{-- Table Waktu --}}
        <table class="w-full table-auto border-collapse border dark:text-white border-gray-700">
            <thead>
                <tr>
                    <th class="border border-gray-700 px-4 py-2">No</th>
                    <th class="border border-gray-700 px-4 py-2">Hari</th>
                    <th class="border border-gray-700 px-4 py-2">Jam Masuk</th>
                    <th class="border border-gray-700 px-4 py-2">Jam Pulang</th>
                    <th class="border border-gray-700 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($waktu as $item)
                    <tr>
                        <td class="border border-gray-600 px-4 py-2">{{ $no }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $item->hari }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $item->jam_masuk }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $item->jam_pulang }}</td>
                        <td class="border border-gray-600 px-4 py-2 flex gap-3 justify-center items-center">
                            {{-- Update Icon --}}
                            <a class="font-bold text-lg text-white" href="{{ route('waktu.update', ['id' => $item->id]) }}">
                                  <svg class="w-6 h-6 bg-blue-700 dark:bg-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"/>
                                  </svg>
                                  
                            </a>
                            {{-- Delete Icon --}}
                            {{-- <form action="{{ route('waktu.delete', ['id' => $item->id]) }}" method="POST" class="font-bold text-lg text-white ">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center">
                                    <svg class="w-6 h-6 bg-red-700 dark:bg-red-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </button>
                            </form> --}}
                        </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
            </tbody>
        </table>

        {{-- Table Izin Pulang --}}
    <h1 class="text-2xl font-semibold mt-5 mb-3 dark:text-white">Data Izin Pulang</h1>
        <table class="w-full table-auto border-collapse border dark:text-white border-gray-700">
            <thead>
                <tr class="text-center">
                    <th class="border border-gray-700 px-4 py-2">No</th>
                    <th class="border border-gray-700 px-4 py-2">UID</th>
                    <th class="border border-gray-700 px-4 py-2">Nama</th>
                    <th class="border border-gray-700 px-4 py-2">Hari</th>
                    <th class="border border-gray-700 px-4 py-2 ">Disetujui/TidakDisetujui</th>
                    <th class="border border-gray-700 px-4 py-2">Jam</th>
                    <th class="border border-gray-700 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($pulang as $item)
                    <tr>
                        <td class="border border-gray-600 px-4 py-2">{{ $no }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $item->user->uid }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $item->user->username }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $item->hari }}</td>
                        <td class="border border-gray-700 px-2 text-center sm:px-4 py-2">
                            <button id="statusBtn-{{ $item->uid }}" 
                              onclick="updateStatus('{{ route('updateStatus', $item->user->uid) }}', '{{ $item->user->uid }}')" 
                              class="{{ $item->status ? 'bg-green-500' : 'bg-red-500' }} p-2 font-bold text-white rounded-lg">
                              {{ $item->status ? 'Disetujui' : 'TidakDisetujui' }}
                            </button>
                        </td>
                        <td class="border border-gray-600 px-4 py-2">{{ $item->jam_pulang }}</td>
                        <td class="border border-gray-600 px-4 py-2 flex gap-3 justify-center items-center">
                            {{-- Update Icon --}}
                            <a class="font-bold text-lg text-white py-2" href="{{ route('waktu.update', ['id' => $item->id]) }}">
                                  <svg class="w-6 h-6 bg-blue-700 dark:bg-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"/>
                                  </svg>
                            </a>
                        </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
            </tbody>
        </table>
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
              btn.textContent = data.status ? 'Disetujui' : 'TidakDisetujui';
              btn.className = data.status ? 'bg-green-500 p-2 font-bold text-white rounded-lg' 
                                          : 'bg-red-500 p-2 font-bold text-white rounded-lg';
          }
      })
      .catch(error => console.error('Error:', error));
  }
    </script>
@endsection
