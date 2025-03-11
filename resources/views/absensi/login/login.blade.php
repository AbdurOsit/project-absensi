<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="min-h-screen flex">
        <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-900 p-8">
            <div class="w-full max-w-md space-y-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-purple-500">Login</h2>
                </div>

                <form action="{{ route('auth') }}" method="post" class="mt-8 space-y-6">
                    @csrf
                    <div class="space-y-4">
                        <div class="relative">
                            <input type="text" placeholder="Username"
                                class="block w-full px-4 py-2 border border-gray-700 rounded-md bg-gray-800 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                name="username" value="{{ Session::get('username') }}">
                        </div>
                        <div class="relative flex items-center">
                            <input type="password" placeholder="Password"
                                class="block w-full px-4 py-2 border border-gray-700 rounded-md bg-gray-800 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                name="password">
                                @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            <!-- Eye icon -->
                            <svg class="absolute right-3 w-6 h-6 text-gray-400 cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>    
                            <!-- Eye slash icon (initially hidden) -->
                            <svg class="absolute right-3 w-6 h-6 text-gray-400 cursor-pointer hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="remember-me"
                            class="h-4 w-4 text-purple-500 focus:ring-purple-500 border-gray-700 rounded bg-gray-800"
                            name="remember">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-300">Remember Me</label>
                    </div>
                    <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-purple-500 hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200">Login
                    </button>
                </form>
            </div>
        </div>

        <div class="hidden md:block md:w-1/2 bg-cover bg-center relative">
            <!-- Using higher quality image for the background -->
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('https://w0.peakpx.com/wallpaper/39/64/HD-wallpaper-late-afternoon-trail-runs-with-a-beautiful-sunset-germany-clouds-sky-mountains-forest-colors-trees.jpg')">
                <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center">
                    <div class="px-8 text-white">
                        <h2 class="text-4xl font-bold mb-4">Welcome back!</h2>
                        <p class="text-lg">Kamu bisa login dengan akun yang kamu punya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    // Get the password input element and both icon elements
const passwordInput = document.querySelector('input[name="password"]');
const eyeIcon = document.querySelector('svg:nth-of-type(1)');
const eyeSlashIcon = document.querySelector('svg:nth-of-type(2)');

// Initially hide the eye-slash icon
eyeSlashIcon.classList.add('hidden');

// Function to toggle password visibility
function togglePasswordVisibility() {
    // Toggle the type attribute of the password input
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    
    // Toggle visibility of the icons
    eyeIcon.classList.toggle('hidden');
    eyeSlashIcon.classList.toggle('hidden');
}

// Add click event listeners to both icons
eyeIcon.addEventListener('click', togglePasswordVisibility);
eyeSlashIcon.addEventListener('click', togglePasswordVisibility);
</script>
</html>
