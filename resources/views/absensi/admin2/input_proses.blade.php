@extends('absensi.admin2.layout')
@section('admin2')
    <div class="container mx-auto">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <!-- Card Header -->
            <div class="border-b border-gray-200 dark:border-gray-700 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Input Data Siswa</h2>
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
                <form action="{{ route('admin.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Card Number Input -->
                    <div class="space-y-2">
                        <label for="uid" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Card Number
                        </label>
                        <input type="text" name="uid" id="uid" value="{{ old('uid') }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('uid') border-red-500 @enderror"
                            placeholder="Masukkan nomor kartu">
                        @error('uid')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Name Input -->
                    <div class="space-y-2">
                        <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Username
                        </label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror"
                            placeholder="Masukkan Username">
                        @error('username')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Role Input -->
                    <div class="space-y-2">
                        <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Role
                        </label>

                        <select name="role" id="role"
                            class="w-24 p-2 rounded-lg dark:text-white dark:bg-gray-600 border border-none">
                            @foreach ($role as $item)
                                <option value="{{ $item->id }}" {{ old('role_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>

                        @error('role')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Class Input -->
                    <div class="space-y-2">
                        <label for="kelas" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Class
                        </label>
                        <input type="number" name="kelas" id="kelas" value="12"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror">
                        @error('kelas')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Jurusan Input --}}
                    <div class="space-y-2">
                        <label for="jurusan" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Jurusan
                        </label>
                        <input type="text" name="jurusan" id="jurusan" value="SIJA"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror">
                        @error('jurusan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- email input --}}
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Email
                        </label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Password
                        </label>
                        <input type="text" name="password" id="password"  value="{{ old('password') }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror">
                        <button type="button" onclick="generatePassword()" class="bg-purple-500 text-white p-2 rounded-lg">Generate Password</button>
                        @error('password')
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
    <script>
        function generatePassword() {
        let username = document.getElementById('username').value.trim();
        if (username === "") {
            alert("Masukkan username terlebih dahulu!");
            return;
        }
        let randomNum = Math.floor(Math.random() * 900) + 100; // 3 digit angka acak
        document.getElementById('password').value = username + randomNum;
    }
    </script>
@endsection
