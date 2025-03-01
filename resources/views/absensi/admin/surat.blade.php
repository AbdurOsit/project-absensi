@extends('absensi.admin.layout2')
@section('p')
<style>
    [data-theme="dark"] {
        --tw-bg-opacity: 1;
        --tw-text-opacity: 1;
        --bg-color: rgba(31, 41, 55, 1);
        --text-color: rgba(255, 255, 255, 1);
        --table-bg: rgba(55, 65, 81, 1);
        --border-color: rgba(75, 85, 99, 1);
    }

    [data-theme="light"] {
        --tw-bg-opacity: 1;
        --tw-text-opacity: 1;
        --bg-color: rgba(255, 255, 255, 1);
        --table-bg: rgba(217, 221, 228, 1);
        --border-color: rgba(200, 200, 200, 1);
    }
    [data-theme="light"] h1{
        color: rgb(39, 37, 37, var(--tw-bg-opacity));
    }
    [data-theme="light"] .form{
        background-color: rgb(255, 255, 255, var(--tw-bg-opacity));
        border: 2px solid rgb(29, 28, 28, var(--tw-bg-opacity));
    }
    [data-theme="light"] input{
        background-color: rgb(255, 255, 255, var(--tw-bg-opacity));
        color: rgb(22, 21, 21, var(--tw-bg-opacity));
        border: rgb(255, 255, 255, var(--tw-bg-opacity));
    }
    body {
        background-color: var(--bg-color);
        color: var(--text-color);
    }
    h1{
        color: var(--text-color);
    }
</style>
<body class="min-h-screen bg-zinc-900">
    <div class="w-full max-w-md">
        <h1 class="text-2xl font-semibold text-black-900 dark:text-dark-900 mb-6">Input Surat</h1>
        
        <div class="bg-white dark:bg-white rounded-lg p-6 shadow-lg form">
            <form class="space-y-4">
                <!-- Nama Input -->
                <div class="border-b border-zinc-600">
                    <input type="text" 
                           placeholder="Nama" 
                           class="w-full bg-transparent text-white border-none focus:outline-none focus:ring-0 pb-2">
                </div>

                <!-- Absen Input -->
                <div class="border-b border-zinc-600">
                    <input type="text" 
                           placeholder="Absen" 
                           class="w-full bg-transparent text-white border-none focus:outline-none focus:ring-0 pb-2">
                </div>

                <!-- Keterangan Input -->
                <div class="border-b border-zinc-600">
                    <input type="text" 
                           placeholder="Keterangan" 
                           class="w-full bg-transparent text-white border-none focus:outline-none focus:ring-0 pb-2">
                </div>

                <!-- Tanggal Input -->
                <div class="border-b border-zinc-600">
                    <input type="date" 
                           placeholder="Tanggal" 
                           class="w-full bg-transparent text-white border-none focus:outline-none focus:ring-0 pb-2">
                </div>

                <!-- Upload Area -->
                <div class="mt-6">
                    <div class="relative border-2 border-dashed border-zinc-600 rounded-lg p-8 text-center hover:border-zinc-400 transition-colors">
                        <input type="file" 
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
                        class="w-full mt-6 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors">
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
    </script>
</body>
@endsection
