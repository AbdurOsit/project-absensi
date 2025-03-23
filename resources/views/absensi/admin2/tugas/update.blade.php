@extends('absensi.admin2.layout')
@section('admin2')
    <div class="container mx-auto">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <!-- Card Header -->
            <div class="border-b border-gray-200 dark:border-gray-700 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Update Tugas</h2>
            </div>

            <!-- Form Content -->
            <div class="p-4">
                <form action="{{ route('tugas.update_proccess', $data->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <!-- Id Update -->
                    <div class="space-y-2">
                        <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                    </div>

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

                    {{-- Tanggal Update --}}
                    <div class="space-y-2">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Tanggal
                        </label>
                        <input type="date" name="tanggal" id="tanggal" value="{{ $data->tanggal }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white @error('hari') border-red-500 @enderror">
                    </div>

                    {{-- Tugas Update --}}
                    <div class="space-y-2">
                        <label for="tugas" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Tugas
                        </label>
                        <textarea name="tugas" id="tugas" cols="82" rows="5" class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white">{{ $data->tugas }}</textarea>
                    </div>


                    <!-- Deadline hari update -->
                    <div class="space-y-2">
                        <label for="kelas" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Deadline hari
                        </label>
                        <input type="text" name="deadline_hari" id="deadline_hari" cols="82" rows="5" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white" value="{{ $data->deadline_hari }}">
                    </div>

                    <!-- Deadline tanggal update -->
                    <div class="space-y-2">
                        <label for="kelas" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Deadline tanggal
                        </label>
                        <input type="date" name="deadline_tanggal" id="deadline_tanggal" cols="82" rows="5" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white" value="{{ $data->deadline_tanggal }}">
    
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
