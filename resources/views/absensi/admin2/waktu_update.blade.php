@extends('absensi.admin2.layout')
@section('admin2')
    <div class="container mx-auto">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <!-- Card Header -->
            <div class="border-b border-gray-200 dark:border-gray-700 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Input Waktu</h2>
            </div>

            <!-- Flash Messages -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 mx-6"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Form Content -->
            <div class="p-4">
                <form action="{{ route('waktu.update.proccess', ['id' => $waktu->id]) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <!-- Hari Input -->
                    <!-- Hari update -->
                    <div class="space-y-2">
                        <label for="hari" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Hari
                        </label>
                        @php
                            $hari_enum = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                            $selected_hari = old('hari', $data->hari ?? ''); // Ambil dari database jika tidak ada old input
                        @endphp
                    
                        <select name="hari" id="hari"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('hari') border-red-500 @enderror">
                            @foreach($hari_enum as $h)
                                <option value="{{ $h }}" {{ $selected_hari == $h ? 'selected' : '' }}>{{ $h }}</option>
                            @endforeach
                        </select>
                        @error('hari')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jam Masuk Input -->
                    <div class="space-y-2">
                        <label for="jam_masuk" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Jam Masuk
                        </label>
                        <input type="time" name="jam_masuk" id="jam_masuk" value="{{ $waktu->jam_masuk }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('jam_masuk') border-red-500 @enderror"
                            placeholder="Masukkan jam_masuk">
                        @error('jam_masuk')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jam Pulang input --}}
                    <div class="space-y-2">
                        <label for="jam_pulang" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Jam Pulang
                        </label>
                        <input type="time" name="jam_pulang" id="jam_pulang" value="{{ $waktu->jam_pulang }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('jam_pulang') border-red-500 @enderror"
                            placeholder="Masukkan Username">
                        @error('jam_pulang')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Buttons -->
                    <div class="flex justify-between space-x-4 pt-4">

                        <div class="flex justify-start items-center px-4 py-3 text-sm font-medium text-white bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600"><a href="{{ route('admin.input') }}" >Back</a></div>

                        <div>
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
