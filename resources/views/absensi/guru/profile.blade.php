@extends('absensi.guru.layout')
@section('guru')    
<h1 class="dark:text-white text-2xl font-semibold mb-6">
    Hi, {{ $data->username }}
</h1>
@if (session('sukses'))
    <div class="bg-green-500 text-white p-2 rounded">
        {{ session('sukses') }}
    </div>
@endif
<!-- Profile Card -->
<div class="bg-gray-300 dark:bg-gray-800 rounded-xl p-4 mb-5">
    <!-- Responsive container for profile content -->
    <div class="flex flex-col md:flex-row items-center md:space-x-4">
        <!-- Profile Image - centered on mobile, left on desktop -->
        <div class="flex justify-center w-full md:w-auto mb-4 md:mb-0">
            @if (Auth::user()->image)
                <img src="{{ asset('image/' . Auth::user()->image) }}" alt="Profile" class="w-32 h-32 md:w-44 md:h-44 rounded-full" />
            @else
                <img src="https://tse2.mm.bing.net/th?id=OIP.bunDCjSjB6yognR-L7SpQgHaHa&pid=Api&P=0&h=220" alt="Profile"
                    class="w-32 h-32 md:w-44 md:h-44 rounded-full" />
            @endif
        </div>

        <!-- Profile Info - centered on mobile, left aligned on desktop -->
        <div class="dark:text-white space-y-2 md:space-y-4 text-center md:text-left md:pl-6 text-xl md:text-2xl font-serif">
            <p>Nama: {{ $data->username }}</p>
            <p>Jurusan: {{ $data->jurusan }}</p>
        </div>
    </div>

    {{-- Update Profile Icon - always at the right --}}
    <div class="flex justify-end mt-4 md:mt-0">
        <div class="bg-purple-600 w-10 h-10 rounded-full flex justify-center items-center">
            <a href="{{ route('guru.profile.update', ['uid' => $data->uid]) }}">
                <svg class="w-6 h-6 text-gray-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection