@extends('absensi.admin2.layout')
@section('admin2')
    @if (session('sukses'))
        <div class="bg-green-500 text-white p-2 rounded">
            {{ session('sukses') }}
        </div>
    @endif
    
    <!-- Main Title -->
    <h1 class="text-2xl font-semibold mb-8 dark:text-white">Input Praktek dan Kegiatan</h1>
    <!-- Data Tugas -->
    {{-- <div class="w-full mt-6 tugas">
        <div class="mb-3 flex flex-col md:flex-row md:items-center md:justify-start gap-3">
            <h2 class="dark:text-white text-xl mb-3 font-semibold">Table Tugas</h2>
            <a href="/tugas/create" class="bg-purple-600 px-5 py-2 ml-2 rounded-xl text-white font-bold button text-center "><button>Create</button ></a>
        </div>
        <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border dark:text-white border-gray-700">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Tugas</th>
                    <th>Hari Deadline</th>
                    <th>Tanggal Deadline</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody> --}}
                {{-- @php
                    $no = 1;
                @endphp
                @foreach ($tugas as $item) --}}
                    {{-- <tr> --}}
                        {{-- <td>{{ $no }}</td> --}}
                        {{-- <td>{{ $item->hari }}</td> --}}
                        {{-- <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td> --}}
                        {{-- <td>{{ $item->tugas }}</td> --}}
                        {{-- <td>{{ $item->deadline_hari }}</td> --}}
                        {{-- <td>{{ \Carbon\Carbon::parse($item->deadline_tanggal)->format('d M Y') }}</td> --}}
                        {{-- <td class="last:text-center"> --}}

                            {{-- Update Icon --}}
                            {{-- <a class="font-bold text-lg text-white" href="{{ route('tugas.update',  $item->id) }}"> --}}
                                {{-- <svg class="w-6 h-6 bg-blue-700 dark:bg-blue-500" aria-hidden="true" --}}
                                    {{-- xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" --}}
                                    {{-- viewBox="0 0 24 24"> --}}
                                    {{-- <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" --}}
                                        {{-- stroke-width="2" --}}
                                        {{-- d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778" /> --}}
                                {{-- </svg> --}}
                            {{-- </a> --}}

                            {{-- Delete Icon --}}
                            {{-- <form action="{{ route('tugas.delete', $item->id) }}" method="POST" class="font-bold text-lg text-white"> --}}
                                {{-- @csrf --}}
                                {{-- @method('DELETE') --}}
                                {{-- <button type="submit"> --}}
                                    {{-- <svg class="w-6 h-6 bg-red-700 dark:bg-red-500" aria-hidden="true" --}}
                                        {{-- xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" --}}
                                        {{-- viewBox="0 0 24 24"> --}}
                                        {{-- <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" --}}
                                            {{-- stroke-width="2" --}}
                                            {{-- d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" /> --}}
                                    {{-- </svg> --}}
                                {{-- </button> --}}
                            {{-- </form> --}}
                        {{-- </td> --}}
                    {{-- </tr> --}}
                    {{-- @php --}}
                        {{-- $no++; --}}
                    {{-- @endphp --}}
                {{-- @endforeach --}}
            {{-- </tbody> --}}
        {{-- </table> --}}
    {{-- </div> --}}
        <!-- Pagination -->
        {{-- <div class="mt-4">
            {{ $tugas->appends(['tugas_page' => request('tugas_page'),'praktek_page' => request('praktek_page'), 'kegiatan_page' => request('kegiatan_page')])->links('pagination::tailwind') }}
        </div>
    </div> --}}

    <!-- Data Praktek -->
    <div class="w-full mt-6 praktek">
        <div class="mb-3 flex flex-col md:flex-row md:items-center md:justify-start gap-3">
            <h2 class="dark:text-white text-xl mb-3 font-semibold">Table Praktek</h2>
            <a href="{{ route('praktek.input') }}" class="bg-purple-600 px-5 py-2 ml-2 rounded-xl text-white font-bold button text-center"><button>Create</button ></a>
        </div>
        <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Praktek</th>
                    <th class="last:text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($praktek as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                        <td>{{ $item->praktek }}</td>
                        <td class="last:text-center justify-center flex gap-2">

                            {{-- Update Icon --}}
                            <a class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-600 transition-colors" href="{{ route('praktek.update', $item->id) }}">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                                </svg>
                            </a>

                            {{-- Delete Icon --}}
                            <form action="{{ route('praktek.delete',$item->id) }}" method="POST" class="font-bold text-lg text-white">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600 transition-colors">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
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
    </div>
        <!-- Pagination -->
        <div class="mt-4">
            {{ $praktek->appends(['tugas_page' => request('tugas_page'),'praktek_page' => request('praktek_page'), 'kegiatan_page' => request('kegiatan_page')])->links('pagination::tailwind') }}
        </div>
    </div>

    <!-- Data Kegiatan --> 
    <div class="w-full mt-6 kegiatan">
        <div class="mb-3 flex flex-col md:flex-row md:items-center md:justify-start gap-3">
            <h2 class="dark:text-white text-xl mb-3 font-semibold">Table Kegiatan</h2>
            <a href="{{ route('kegiatan.input') }}" class="bg-purple-600 px-5 py-2 ml-2 rounded-xl text-white font-bold button text-center"><button>Create</button ></a>
        </div>
        <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Kegiatan</th>
                    <th class="last:text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($kegiatan as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                        <td>{{ $item->kegiatan }}</td>
                        <td class="last:text-center">
                            <div class="flex justify-center gap-2">
                                {{-- Update Icon --}}
                            <a class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-600 transition-colors" href="{{ route('kegiatan.update', $item->id) }}">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                                </svg>
                            </a>

                            {{-- Delete Icon --}}
                            <form action="{{ route('kegiatan.delete',$item->id) }}" method="POST" class="font-bold text-lg text-white">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600 transition-colors">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                    </svg>
                                </button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
        <!-- Pagination -->
        <div class="mt-4 relative z-10">
            {{ $kegiatan->appends(['tugas_page' => request('tugas_page'),'praktek_page' => request('praktek_page'), 'kegiatan_page' => request('kegiatan_page')])->links('pagination::tailwind') }}
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const query = localStorage.getItem("searchQuery") || ""; // Ambil dari LocalStorage
            const tugasElements = document.querySelectorAll(".tugas");
            const praktekElements = document.querySelectorAll(".praktek");
            const kegiatanElements = document.querySelectorAll(".kegiatan");
    
            function filterData(query) {
                if (query.includes("tugas")) {
                    tugasElements.forEach(el => el.style.display = "table-row");
                    praktekElements.forEach(el => el.style.display = "none");
                    kegiatanElements.forEach(el => el.style.display = "none");
                } else if (query.includes("praktek")) {
                    tugasElements.forEach(el => el.style.display = "none");
                    praktekElements.forEach(el => el.style.display = "table-row");
                    kegiatanElements.forEach(el => el.style.display = "none");
                } else if (query.includes("kegiatan")) {
                    tugasElements.forEach(el => el.style.display = "none");
                    praktekElements.forEach(el => el.style.display = "none");
                    kegiatanElements.forEach(el => el.style.display = "table-row");
                } else {
                    // Jika pencarian kosong, tampilkan semua
                    tugasElements.forEach(el => el.style.display = "block");
                    praktekElements.forEach(el => el.style.display = "block");
                    kegiatanElements.forEach(el => el.style.display = "block");
                }
            }

            filterData(query); // Jalankan saat halaman dimuat
    
            // Pastikan data reset jika user menghapus pencarian
            window.addEventListener("storage", function (event) {
                if (event.key === "searchQuery") {
                    filterData(event.newValue);
                }
            });
        });
    </script>
    
@endsection
