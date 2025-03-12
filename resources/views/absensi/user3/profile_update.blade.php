@extends('absensi.user3.layout')
@section('user3')
<div class="container mx-auto">
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <!-- Card Header -->
        <div class="border-b border-gray-200 dark:border-gray-700 p-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Update Data </h2>
        </div>

        <!-- Form Content -->
        <div class="p-4">
            <form action="{{ route('profile.update_proccess', ['uid' => $data->uid]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <!-- Card Number Input -->
                <div class="space-y-2">
                    <input type="hidden" name="uid" id="uid" value="{{ $data->uid }}">
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

                {{-- Password update --}}
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Password
                    </label>
                    <input type="text" name="password" id="password"  value="{{ $data->password }}" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-purple-600 focus:border-transparent dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Buttons -->
                <div class="flex justify-between space-x-4 pt-4">
                    <div class="flex justify-start items-center px-4 py-3 text-sm font-medium text-white bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600"><a href="{{ route('admin.input') }}" >Back</a></div>
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