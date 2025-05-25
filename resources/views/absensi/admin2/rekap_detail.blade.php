@extends('absensi.admin2.layout')
@section('admin2')
{{-- <h1 class="dark:text-white text-2xl m-5 font-bold">{{ $name->username }}</h1> --}}
<!-- Table -->
        <div class="overflow-x-auto mb-5">
            <table class="table">
                <thead>
                    <tr class="dark:text-white">
                        <th>Username</th>
                        <th>Hari/Tanggal tidak masuk</th>
                        <th>Alasan</th>
                    </tr>
                </thead>
                {{-- <tbody class="divide-y" id="rekapRealtimeBody"> --}}
                <tbody class="divide-y">
                    @php $no = 1; @endphp
                    @if($data->isEmpty())
                        <tr class="dark:text-white">
                            <td colspan="6" class="text-center py-1 dark:text-white">siswa Belum pernah izin/sakit/alpha</td>
                        </tr>
                    @else
                    @foreach ($data as $item) 
                    <tr class="dark:text-white">
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->hari }} / {{ Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->alasan }}</td>
                    </tr>
                    @php $no++; @endphp
                    @endforeach
                    @endif
                </tbody>
            </table>
            {{-- {{ $data->links('pagination::tailwind') }} --}}
        </div>
        <a href="{{ route("admin.tidak_hadir") }}" class="p-3 text-white font-bold rounded-md bg-purple-600">Back</a>
@endsection