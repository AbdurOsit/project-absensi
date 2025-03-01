@extends('absensi.admin.layout2')
@section('p')    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <style>
        [data-theme="dark"] {
            --tw-bg-opacity: 1;
            --tw-text-opacity: 1;
            --bg-color: rgba(31, 41, 55, 1);
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
        [data-theme="light"] .div2{
            background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
            color: rgb(10, 10, 10, var(--tw-text-opacity));
        }
        [data-theme="light"] h1{
            color: rgb(10, 10, 10, var(--tw-text-opacity));
        }
    </style>
</head>
{{-- <body class="min-h-screen bg-zinc-900 flex items-center justify-center p-4"> --}}
<body class="min-h-screen bg-zinc-900">
    <div class="w-full max-w-md">
        
        <div class="bg-white dark:bg-white rounded-xl p-6 shadow-lg div2">
            <!-- Header -->
            <h1 class="text-2xl font-semibold text-dark dark:text-dark mb-6">
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
    </script>
</body>
</html>
@endsection
