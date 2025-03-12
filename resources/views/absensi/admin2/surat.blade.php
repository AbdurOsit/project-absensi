@extends('absensi.admin2.layout')
@section('admin2')
<body class="min-h-screen bg-gray-800">
    <div class="w-full max-w-md">
        <h1 class="text-2xl font-semibold text-black-900 dark:text-white mb-2">Input Surat</h1>
        
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-lg form">
            <form action="{{ route('surat.proccess') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Username Input -->
                <div class="border-b border-zinc-600">
                    <label for="username" class="dark:text-white font-bold">Username :</label>
                    <input type="text" 
                           placeholder="example: brody" 
                           class="w-full bg-transparent dark:text-white border-none focus:outline-none focus:ring-0 pb-2"
                           name="username">
                </div>

                <!-- Uid Input -->
                <div class="border-b border-zinc-600">
                    <label for="Uid" class="dark:text-white font-bold">Uid :</label>
                    <input type="text"
                           placeholder="example: 12r5ft" 
                           name="uid"
                           class="w-full bg-transparent dark:text-white border-none focus:outline-none focus:ring-0 pb-2">
                </div>

                <!-- Alasan Input -->
                <div class="border-b border-zinc-600">
                    <label for="Alasan" class="dark:text-white font-bold">Alasan(sakit,izin,alpha) :</label>
                    <input type="text" 
                           placeholder="example: izin"
                           class="w-full bg-transparent dark:text-white border-none focus:outline-none focus:ring-0 pb-2 lowercase">
                </div>

                <!-- Tanggal Input -->
                <div class="border-b border-zinc-600">
                    <label for="username" class="dark:text-white font-bold">Tanggal :</label>
                    <input type="date" 
                            id="tanggal"
                            placeholder="Tanggal"        
                           class="w-full bg-transparent dark:text-white border-none focus:outline-none focus:ring-0 pb-2">
                </div>

                <!-- Upload Area -->
                <div class="mt-6">
                    <div class="relative border-2 border-dashed border-zinc-600 rounded-lg p-8 text-center hover:border-zinc-400 transition-colors">
                        <input type="file" 
                               name="surat"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                               accept="image/*">
                        
                        <div class="space-y-2">
                            <!-- Upload Icon -->
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
                            <p class="text-zinc-400 text-sm">Upload Surat</p>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full mt-6 bg-blue-500 dark:text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors">
                  Submit
                </button>
            </form>
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
            document.getElementById("tanggal").valueAsDate = new Date();
        });
    </script>
</body>
@endsection
