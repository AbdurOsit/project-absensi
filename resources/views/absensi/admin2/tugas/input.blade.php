@extends('absensi.admin2.layout')
@section('admin2')
    <div class="container mx-auto">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <!-- Card Header -->
            <div class="border-b border-gray-200 dark:border-gray-700 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Input Tugas</h2>
            </div>

            <!-- Form Content -->
            <div class="p-4">
                <form action="{{ route('tugas.create') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Id Input -->
                    <div class="space-y-2">
                        <input type="hidden" name="id" id="id">
                    </div>

                    <!-- Hari Input -->
                    <div class="space-y-2">
                        @php
                            use Carbon\Carbon;
                            $hari_ini = Carbon::now()->locale('id')->isoFormat('dddd'); // Mendapatkan nama hari dalam Bahasa Indonesia
                            $hari_ini = ucfirst($hari_ini); // Mengubah huruf pertama menjadi kapital
                        @endphp
                        <label for="hari" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Hari
                        </label>
                        <select name="hari" id="hari"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white">
                            <option value="">-- Pilih Hari --</option>
                            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                            <option value="{{ $hari }}" {{ $hari_ini == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                            @endforeach
                        </select>
                            @error('hari')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                    </div>

                    {{-- Tanggal Input --}}
                    <div class="space-y-2">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Tanggal
                        </label>
                    <input type="date" name="tanggal" id="tanggal"   
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white @error('hari') border-red-500 @enderror" value="{{ old('tanggal',$tanggal) }}">
                        @error('tanggal')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tugas Input --}}
                    <div class="space-y-2">
                        <label for="tugas" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Tugas
                        </label>
                        <textarea name="tugas" id="tugas" cols="82" rows="5" class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white">{{ old('tugas') }}</textarea>
                    </div>

                    <!-- Deadline hari Input -->
                    <div class="space-y-2">
                        <label for="kelas" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Deadline hari
                        </label>
                        <select type="text" name="deadline_hari" id="hari"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('deadline_hari') border-red-500 @enderror"
                            >
                            @php
                            $hari_enum = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                            @endphp
                                <option value="">-- Pilih Hari --</option>
                                @foreach($hari_enum as $deadline_hari)
                                @if (old('deadline_hari') == $deadline_hari) 
                                <option value="{{ $deadline_hari }}" selected>{{ $deadline_hari }}</option>
                                @else
                                <option value="{{ $deadline_hari }}">{{ $deadline_hari }}</option>
                                @endif
                                @endforeach
                        </select>
                            @error('deadline_hari')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                    </div>

                    <!-- Deadline tanggal Input -->
                    <div class="space-y-2">
                        <label for="kelas" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Deadline tanggal
                        </label>
                        <input type="date" name="deadline_tanggal" id="deadline_tanggal" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('deadline_tanggal') border-red-500 @enderror"  value="{{ old('deadline_tanggal') }}">
                        @error('deadline_tanggal')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Buttons -->
                    <div class="flex justify-between space-x-4 pt-4">
                        <div class="flex justify-start items-center px-4 py-3 text-sm font-medium text-white bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600"><a href="{{ route('admin.jadwal') }}" >Back</a></div>
                        <div class="flex justify-end space-x-4">
                            <button type="reset"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-600 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500">
                                Reset
                            </button>
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
