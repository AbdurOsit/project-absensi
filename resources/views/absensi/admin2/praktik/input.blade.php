@extends('absensi.admin2.layout')
@section('admin2')
    <div class="container mx-auto">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <!-- Card Header -->
            <div class="border-b border-gray-200 dark:border-gray-700 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Input Praktek</h2>
            </div>

            <!-- Form Content -->
            <div class="p-4">
                <form action="{{ route('praktek.create') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Id Input -->
                    <div class="space-y-2">
                        <input type="hidden" name="id" id="id">
                    </div>

                    <!-- Hari Input -->
                    <div class="space-y-2">
                        <label for="hari" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Hari
                        </label>
                        <select type="text" name="hari" id="hari"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('hari') border-red-500 @enderror"
                            >
                                <option value="">-- Pilih Hari --</option>
                                @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                                    <option value="{{ $hari }}">{{ $hari }}</option>
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
                        <input type="date" name="tanggal" id="tanggal" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white @error('hari') border-red-500 @enderror" value="{{ old('tanggal',$tanggal) }}">
                        @error('tanggal')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Praktek Input -->
                    <div class="space-y-2">
                        <label for="praktek" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Praktek
                        </label>
                        <textarea name="praktek" id="praktek" class="w-full h-32 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white">{{ old('praktek') }}</textarea>
    
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
