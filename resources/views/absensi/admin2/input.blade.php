@extends('absensi.admin2.layout')
@section('admin2')
    @if (session('sukses'))
        <div class="bg-green-500 text-white p-2 rounded">
            {{ session('sukses') }}
        </div>
    @endif
    
    <!-- Main Title -->
    <h1 class="text-2xl font-semibold mb-8 dark:text-white">Input Data</h1>
    <a href="{{ route('admin.input_form') }}" class="bg-purple-600 p-3 rounded-xl text-white font-bold button"><button>Create</button ></a>
    <!-- Data Grid -->
    <div class="w-3/4 mt-6">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No. Card</th>
                    <th>Username</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Role</th>
                    <th class="last:text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($data as $item)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $item->uid }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->jurusan }}</td>
                    <td>{{ $item->role->name }}</td>
                    <td class="last:text-center">
                        <div class="flex justify-center gap-3">
                            {{-- Update Icon --}}
                            <a href="{{ route('admin.update', $item->id) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-600 transition-colors">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                                </svg>
                            </a>
                            {{-- Delete Icon --}}
                            <form action="{{ route('admin.delete', $item->id) }}" method="POST">
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
                @php $no++; @endphp
                @endforeach
            </tbody>
        </table>
        {{ $data->links('pagination::tailwind') }}
    </div>
@endsection
