@extends('absensi.admin2.layout')
@section('admin2')
    <body class="min-h-screen bg-gray-800">
        <div class="w-full">
            <h1 class="text-2xl font-semibold text-black-900 dark:text-white mb-2">Input Surat</h1>
            @if (session('sukses'))
                <div class="bg-green-500 text-white p-2 rounded">
                    {{ session('sukses') }}
                </div>
            {{-- @elseif(session('error'))
                <div class="bg-red-500 text-white p-2 rounded">
                    {{ session('error') }}
                </div> --}}
            @endif
            <div class="flex">
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-lg form">
                    <form action="{{ route('surat.proccess') }}" method="POST" class="space-y-4"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Username Input -->
                        <div class="border-b border-zinc-600">
                            <label for="username" class="dark:text-white font-bold">Username :</label>
                            <input type="text" placeholder="example: brody"
                                class="w-full bg-transparent dark:text-white border-none focus:outline-none focus:ring-0 pb-2 @error('username') border-red-500 @enderror"
                                name="username" value="{{ old('username') }}">
                            </div>
                            @error('username')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror

                        <!-- Kelas Input -->
                        <div class="border-b border-zinc-600">
                            <label for="username" class="dark:text-white font-bold">Kelas :</label>
                            <input type="text" placeholder="example: 12"
                                class="w-full bg-transparent dark:text-white border-none focus:outline-none focus:ring-0 pb-2 @error('kelas') border-red-500 @enderror"
                                name="kelas" value="12">
                        </div>

                        <!-- Jurusan Input -->
                        <div class="border-b border-zinc-600">
                            <label for="jurusan" class="dark:text-white font-bold">Jurusan :</label>
                            <input type="text" placeholder="example: Sija"
                                class="w-full bg-transparent dark:text-white border-none focus:outline-none focus:ring-0 pb-2 capitalize @error('jurusan') border-red-500 @enderror"
                                name="jurusan" value="Sija">
                        </div>

                        <!-- Alasan Input -->
                        <div class="border-b border-zinc-600">
                            <label for="Alasan" class="dark:text-white font-bold">Alasan(sakit,izin,alpha) :</label>
                            <input type="text" placeholder="example: izin"
                                class="w-full bg-transparent dark:text-white border-none focus:outline-none focus:ring-0 pb-2 lowercase @error('alasan') border-red-500 @enderror"
                                name="alasan" value="{{ old('alasan') }}">
                        </div>

                        <!-- Hari Input -->
                        <div class="border-b border-zinc-600">
                            <label for="username" class="dark:text-white font-bold">Hari :</label>
                            <input id="hari" placeholder="Hari"
                                class="w-full bg-transparent dark:text-white border-none focus:outline-none focus:ring-0 pb-2 @error('hari') border-red-500 @enderror"
                                name="hari">
                        </div>

                        <!-- Tanggal Input -->
                        <div class="border-b border-zinc-600">
                            <label for="username" class="dark:text-white font-bold">Tanggal :</label>
                            <input type="date" id="tanggal"
                                class="w-full bg-transparent dark:text-white border-none focus:outline-none focus:ring-0 pb-2 @error('tanggal') border-red-500 @enderror"
                                name="tanggal">
                        </div>

                        <!-- Upload Area -->
                        <div class="mt-6">
                            <div class="relative border-2 border-dashed border-zinc-600 rounded-lg p-8 text-center hover:border-zinc-400 transition-colors">
                                <input type="file" 
                                       name="surat"
                                       id="surat"
                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer @error('surat') border-red-500 @enderror"
                                       accept="image/*"
                                       onchange="previewFile()">
                                
                                <div class="space-y-2">
                                    <svg class="mx-auto h-12 w-12 text-zinc-400" 
                                         xmlns="http://www.w3.org/2000/svg" 
                                         fill="none" 
                                         viewBox="0 0 24 24" 
                                         stroke="currentColor">
                                        <path stroke-linecap="round" 
                                              stroke-linejoin="round" 
                                              stroke-width="2" 
                                              d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p id="file-name" class="text-zinc-400 text-sm">
                                        @if (session('temp_surat'))
                                            File sudah diunggah: {{ session('temp_surat') }}
                                        @else
                                            Upload Surat
                                        @endif
                                    </p>
                                </div>
                            </div>
                        
                            <!-- Preview Gambar -->
                            @if (session('temp_surat'))
                                <img src="{{ asset('storage/' . session('temp_surat')) }}" class="mt-4 w-32 h-32 object-cover rounded" alt="Preview Surat">
                            @endif
                        </div>
                        

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full mt-6 bg-blue-500 dark:text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors">
                            Submit
                        </button>
                    </form>
                </div>
                <div class="dark:text-white ml-5 text-end">
                    <table border="1" class="border border-white w-full">
                        <thead>
                            <tr>
                                <th class="border border-white px-24">Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td class="border border-white text-center py-2">{{ $item->username }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $user->links('pagination::tailwind') }}
                </div>
            </div>
        </div>

        <script>
            // Preview image on file select
            document.querySelector('input[type="file"]').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const uploadArea = document.querySelector('.border-dashed');
                        uploadArea.style.backgroundImage = `url(${e.target.result})`;
                        uploadArea.style.backgroundSize = 'contain';
                        uploadArea.style.backgroundRepeat = 'no-repeat';
                        uploadArea.style.backgroundPosition = 'center';
                    }
                    reader.readAsDataURL(file);
                }
            });

            document.addEventListener("DOMContentLoaded", function() {
                const hariField = document.getElementById("hari");
                const tanggalField = document.getElementById("tanggal");

                // Array nama hari dalam bahasa Indonesia
                const hariList = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

                // Ambil tanggal saat ini
                const today = new Date();
                const dayName = hariList[today.getDay()]; // Ambil nama hari
                const todayDate = today.toISOString().split("T")[0]; // Format YYYY-MM-DD

                // Set nilai default pada input
                hariField.value = dayName;
                tanggalField.value = todayDate;
            });

                function previewFile() {
                    let fileInput = document.getElementById('surat');
                    let fileName = fileInput.files.length > 0 ? fileInput.files[0].name : 'Upload Surat';
                    document.getElementById('file-name').innerText = fileName;
                }
        </script>
    </body>
@endsection
