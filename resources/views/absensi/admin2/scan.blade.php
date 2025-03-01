@extends('absensi.admin2.layout')
@section('admin2')
    {{-- <div class="w-full max-w-md">        
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg div2">
            <!-- Header -->
            <h1 class="text-2xl dark:text-white font-semibold mb-6">
                Scan Card
            </h1>

            <!-- Camera Feed / Scan Area -->
            <div class="relative h-64 rounded-lg border-2 border-dashed border-zinc-600 hover:border-zinc-400 transition-colors duration-300 overflow-hidden camera">
                <!-- Video Feed -->
                <video id="video" 
                       class="absolute inset-0 w-full h-full object-cover hidden"
                       autoplay playsinline></video>

                <!-- Preview Image -->
                <img id="preview" 
                     class="absolute inset-0 w-full h-full object-contain hidden" 
                     alt="Captured card">

                <!-- Initial State -->
                <div id="initial-state" class="relative h-full flex flex-col items-center justify-center text-center">
                    <svg class="w-8 h-8 text-zinc-400 mb-3" 
                         xmlns="http://www.w3.org/2000/svg" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke="currentColor">
                        <path stroke-linecap="round" 
                              stroke-linejoin="round" 
                              stroke-width="2" 
                              d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" 
                              stroke-linejoin="round" 
                              stroke-width="2" 
                              d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <p class="text-zinc-400 text-sm font-medium">
                        Click to scan card
                    </p>
                    <p class="text-zinc-500 text-xs mt-2">
                        Position your card within the frame
                    </p>
                </div>

                <!-- Capture Button -->
                <button id="capture-btn" 
                        class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-white text-black px-4 py-2 rounded-full hidden">
                    Capture
                </button>
            </div>

            <!-- Controls -->
            <div class="mt-4 flex justify-center gap-4">
                <button id="start-btn" 
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
                    Start Scanner
                </button>
                <button id="retake-btn" 
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors hidden">
                    Retake
                </button>
            </div>

            <!-- Security Message -->
            <div class="mt-4 text-center">
                <p class="text-zinc-500 text-xs">
                    Your card details are encrypted and secure
                </p>
            </div>
        </div>
    </div>
    <!-- Canvas for capturing frames (hidden) -->
    <canvas id="canvas" class="hidden"></canvas>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const preview = document.getElementById('preview');
        const startBtn = document.getElementById('start-btn');
        const captureBtn = document.getElementById('capture-btn');
        const retakeBtn = document.getElementById('retake-btn');
        const initialState = document.getElementById('initial-state');
        let stream = null;

        // Start camera
        async function startCamera() {
            try {
                stream = await navigator.mediaDevices.getUserMedia({ 
                    video: { 
                        facingMode: 'environment',
                        width: { ideal: 1280 },
                        height: { ideal: 720 }
                    } 
                });
                video.srcObject = stream;
                video.classList.remove('hidden');
                captureBtn.classList.remove('hidden');
                initialState.classList.add('hidden');
                startBtn.classList.add('hidden');
            } catch (err) {
                console.error('Error accessing camera:', err);
                alert('Unable to access camera. Please make sure you have granted camera permissions.');
            }
        }

        // Capture image
        function captureImage() {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0);
            
            // Show preview
            preview.src = canvas.toDataURL('image/jpeg');
            preview.classList.remove('hidden');
            video.classList.add('hidden');
            captureBtn.classList.add('hidden');
            retakeBtn.classList.remove('hidden');

            // Stop camera
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
            }
        }

        // Retake photo
        function retake() {
            preview.classList.add('hidden');
            retakeBtn.classList.add('hidden');
            startBtn.classList.remove('hidden');
            initialState.classList.remove('hidden');
        }

        // Event listeners
        startBtn.addEventListener('click', startCamera);
        captureBtn.addEventListener('click', captureImage);
        retakeBtn.addEventListener('click', retake);
    </script> --}}
    <div class="w-full max-w-md">        
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg">
            <!-- Header -->
            <h1 class="text-2xl dark:text-white font-semibold mb-6">
                Sistem Absensi
            </h1>
    
            <!-- Card Scan Area -->
            <div class="relative h-64 rounded-lg border-2 border-dashed border-zinc-600 hover:border-zinc-400 transition-colors duration-300 overflow-hidden">
                <!-- Initial State -->
                <div id="initial-state" class="relative h-full flex flex-col items-center justify-center text-center">
                    <!-- Hand holding card icon -->
                    <svg class="w-20 h-20 text-zinc-400 mb-3" 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke="currentColor">
                        <path stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="1.5" 
                            d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
                        <rect x="3" y="6" width="10" height="6" rx="1" stroke-width="1.5" />
                    </svg>
                    <p class="text-zinc-400 text-sm font-medium">
                        Letakkan Kartu di Mesin
                    </p>
                    <p class="text-zinc-500 text-xs mt-2">
                        Tempelkan kartu Anda pada mesin scanner
                    </p>
                </div>
    
                <!-- Scan Result -->
                <div id="scan-result" class="hidden p-4 text-center">
                    <p class="text-lg font-semibold dark:text-white">Kartu Terdeteksi!</p>
                    <p id="employee-name" class="text-xl font-bold text-green-500 mt-2">-</p>
                </div>

                <!-- Scan Status -->
                <div id="scanning-status" class="flex items-center justify-center">
                    <div class="animate-pulse flex space-x-2 items-center">
                        <div class="h-3 w-3 bg-blue-500 rounded-full"></div>
                        <p class="text-zinc-500">Menunggu kartu...</p>
                    </div>
                </div>
            </div>
    
            <!-- Input Form (Hidden but used for submitting data) -->
            <form id="attendance-form" class="hidden" method="POST" action="{{ route('scan.input') }}">
                @csrf
                <input type="hidden" id="form-card-id" name="card_id" value="">
                <input type="hidden" id="form-timestamp" name="timestamp" value="">
            </form>
    
            <!-- Scan Status -->
            <div class="mt-4">
                <div id="scanning-status" class="flex items-center justify-center">
                    <div class="animate-pulse flex space-x-2 items-center">
                        <div class="h-3 w-3 bg-blue-500 rounded-full"></div>
                        <p class="text-zinc-500">Menunggu kartu...</p>
                    </div>
                </div>
                <div id="success-status" class="hidden text-center text-green-500">
                    <p>Absensi berhasil dicatat!</p>
                </div>
                <div id="error-status" class="hidden text-center text-red-500">
                    <p>Gagal membaca kartu. Silakan coba lagi.</p>
                </div>
            </div>
    
            <!-- Recent Records -->
            {{-- <div class="mt-6">
                <h2 class="text-lg font-medium mb-2 dark:text-white">Absensi Terbaru</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama</th>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Waktu</th>
                            </tr>
                        </thead>
                        <tbody id="recent-records" class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            <!-- Records will be inserted here -->
                        </tbody>
                    </table>
                </div>
            </div> --}}
        </div>
    </div>
    <script>
        function fetchLatestScan() {
            fetch("{{ route('get.latest.scan') }}") 
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById("employee-name").textContent = data.user.name;
                        document.getElementById("scan-result").classList.remove("hidden");
                        document.getElementById("scanning-status").classList.add("hidden");
                    } else {
                        document.getElementById("employee-name").textContent = "Kartu tidak ditemukan";
                    }
                })
                .catch(error => console.error("Error fetching scan data:", error));
        }
    
        setInterval(fetchLatestScan, 3000); // Cek setiap 3 detik
    </script>
@endsection
