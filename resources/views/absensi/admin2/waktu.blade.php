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
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th class="last:text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($waktu as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>{{ $item->jam_masuk }}</td>
                        <td>{{ $item->jam_pulang }}</td>
                        <td class="last:text-center flex justify-center">
                            {{-- Update Icon --}}
                            <a class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-600 transition-colors" href="{{ route('waktu.update', ['id' => $item->id]) }}">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
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

        {{-- Table Izin Pulang --}}
    <h1 class="text-2xl font-semibold mt-5 mb-3 dark:text-white">Data Izin Pulang</h1>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>UID</th>
                    <th>Nama</th>
                    <th>Hari</th>
                    <th>Disetujui/TidakDisetujui</th>
                    <th>Jam</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @if ($pulang->isEmpty())
                    <tr>
                        <td colspan="6" class="border border-gray-600 px-4 py-3 text-center">Belum ada yang Izin Pulang</td>
                    </tr>
                @else
                @foreach ($pulang as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->user->uid }}</td>
                        <td>{{ $item->user->username }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>
                            <button id="statusBtn-{{ $item->user->uid }}"
                                onclick="updateStatus('{{ route('pulangStatus', $item->user->uid) }}', '{{ $item->user->uid }}')"
                                class="{{ $item->status ? 'bg-green-500' : 'bg-red-500' }} p-2 font-bold text-white rounded-lg">
                                {{ $item->status ? 'Disetujui' : 'Tidak Disetujui' }}
                            </button>
                        </td>
                        <td>{{ $item->waktu_pulang }}</td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
<script>
    function updateStatus(url, uid) {
        fetch(url, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const btn = document.getElementById('statusBtn-' + uid);
                if (data.new_status) {
                    btn.classList.remove('bg-red-500');
                    btn.classList.add('bg-green-500');
                    btn.innerText = 'Disetujui';
                } else {
                    btn.classList.remove('bg-green-500');
                    btn.classList.add('bg-red-500');
                    btn.innerText = 'Tidak Disetujui';
                }
            } else {
                alert('Gagal memperbarui status');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan');
        });
    }
</script>
@endsection