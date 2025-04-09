@extends('absensi.admin2.layout')
@section('admin2')
    <div class="container mx-auto">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <!-- Card Header -->
            <div class="border-b border-gray-200 dark:border-gray-700 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Update Data </h2>
            </div>

            <!-- Form Content -->
            <div class="p-4">
                <form action="{{ route('admin.update_process', $data->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')
                    <!-- Card Number Input -->
                    <div class="space-y-2">
                        <label for="uid" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Uid
                        </label>
                        <input type="text" name="uid" id="uid" value="{{ $data->uid }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('uid') border-red-500 @enderror">
                        @error('uid')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Name update -->
                    <div class="space-y-2">
                        <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Username
                        </label>
                        <input type="text" name="username" id="username" value="{{ $data->username }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('username') border-red-500 @enderror">
                        @error('username')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Photo profile update --}}
                    <div class="space-y-2">
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Photo Profile
                        </label>
                        @if ($data->image)
                        <img src="{{ asset('image/' . $data->image) }}" alt="Photo Profile"
                                class="w-24 h-24 object-cover rounded-md mb-2">
                        @endif
                        <input type="file" name="image" id="image"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white">
                    </div>

                    {{-- Role update --}}
                    <div class="space-y-2">
                        <label for="jurusan" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Role
                        </label>
                        <select name="role" id="role"
                            class="w-24 p-2 rounded-lg dark:text-white dark:bg-gray-600 border border-none">
                            @foreach ($role as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('role', $data->role_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Class update -->
                    <div class="space-y-2">
                        <label for="kelas" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Class
                        </label>
                        <input type="number" name="kelas" id="kelas" value="{{ $data->kelas }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('kelas') border-red-500 @enderror">
                        @error('kelas')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jurusan update --}}
                    <div class="space-y-2">
                        <label for="jurusan" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Jurusan
                        </label>
                        <input type="text" name="jurusan" id="jurusan" value="{{ $data->jurusan }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('jurusan') border-red-500 @enderror">
                        @error('jurusan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password update --}}
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Password
                        </label>
                        <input type="text" name="password" id="password"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror">
                        <button type="button" onclick="generatePassword()"
                            class="bg-purple-500 text-white p-2 rounded-lg">Generate Password</button>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Buttons -->
                    <div class="flex justify-between space-x-4 pt-4">
                        <div
                            class="flex justify-start items-center px-4 py-3 text-sm font-medium text-white bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                            <a href="{{ route('admin.input') }}">Back</a>
                        </div>
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
    <script>
        function generatePassword() {
            let username = document.getElementById('username').value.trim();
            if (username === "") {
                alert("Masukkan username terlebih dahulu!");
                return;
            }
            // 3 digit angka acak
            // let randomNum = Math.floor(Math.random() * 900) + 100; 
            // document.getElementById('password').value = username + randomNum;
            document.getElementById('password').value = username;
        }
    </script>
@endsection
