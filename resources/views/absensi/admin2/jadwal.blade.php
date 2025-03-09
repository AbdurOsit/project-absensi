@extends('absensi.admin2.layout')
@section('admin2')
    @if (session('sukses'))
        <div class="bg-green-500 text-white p-2 rounded">
            {{ session('sukses') }}
        </div>
    @endif
    
    <!-- Main Title -->
    <h1 class="text-2xl font-semibold mb-8 dark:text-white">Input Jadwal</h1>
    <a href="/jadwal/create" class="bg-purple-600 p-3 rounded-xl text-white font-bold button"><button>Create</button ></a>
    <!-- Data Grid -->
    <div class="w-full mt-6">
        <table class="w-full table-auto border-collapse border dark:text-white border-gray-700">
            <thead>
                <tr>
                    <th class="border border-gray-700 px-4 py-2">No</th>
                    <th class="border border-gray-700 px-4 py-2">Hari</th>
                    <th class="border border-gray-700 px-4 py-2">Tanggal</th>
                    <th class="border border-gray-700 px-4 py-2">Tugas</th>
                    <th class="border border-gray-700 px-4 py-2">Praktek</th>
                    <th class="border border-gray-700 px-4 py-2">Kegiatan</th>
                    <th class="border border-gray-700 px-4 py-2">Hari Deadline</th>
                    <th class="border border-gray-700 px-4 py-2">Tanggal Deadline</th>
                    <th class="border border-gray-700 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <td class="border border-gray-600 px-4 py-2">{{ $no }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $item->hari }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $item->tanggal }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $item->tugas }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $item->praktek }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $item->kegiatan }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $item->deadline_hari }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $item->deadline_tanggal }}</td>
                        <td class="border border-gray-600 px-4 py-2 text-center flex justify-center">

                            {{-- Update Icon --}}
                            <a class="font-bold text-lg text-white" href="{{ route('jadwal.update',  $item->id) }}">
                                <svg class="w-6 h-6 bg-blue-700 dark:bg-blue-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778" />
                                </svg>
                            </a>

                            {{-- Delete Icon --}}
                            <form action="{{ route('jadwal.delete', $item->id) }}" method="POST" class="font-bold text-lg text-white">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <svg class="w-6 h-6 bg-red-700 dark:bg-red-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="mt-4">
            {{ $data->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
