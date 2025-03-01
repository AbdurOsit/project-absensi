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
                                name="username">
                        </div>
                        <div class="relative">
                            <input type="password" placeholder="Password"
                                class="block w-full px-4 py-2 border border-gray-700 rounded-md bg-gray-800 text-gray-200 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                name="password">
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

</html>
