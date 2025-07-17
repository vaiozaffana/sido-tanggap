<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiD TANGGAP - Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .logo-text {
            font-family: 'Arial Black', Arial, sans-serif;
            font-weight: 900;
        }

    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full flex flex-col lg:flex-row items-center space-y-8 lg:space-y-0 lg:space-x-12">

            <!-- Left side - Registration Form -->
            <div class="w-full lg:w-1/2 max-w-md">
                <div class="bg-white shadow-lg rounded-lg p-8">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">SELAMAT DATANG</h1>
                        <p class="text-gray-600">Selamat datang, silahkan daftarkan data diri anda</p>
                    </div>

                    <form action="{{ route('register') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colorss"
                                placeholder="Masukkan Nama"
                                required
                            >
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="w-full px-4 py-3 border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors"
                                placeholder="Masukkan Email"
                                required
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                Password
                            </label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors"
                                placeholder="••••••••••"
                                required
                            >
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Address Field -->

                        <!-- Remember Me Checkbox -->
                        <div class="flex items-center">
                            <input
                                id="remember"
                                name="remember"
                                type="checkbox"
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded"
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            <label for="remember" class="ml-2 block text-sm text-gray-700">
                                Remember Me
                            </label>
                        </div>

                        <!-- Register Button -->
                        <button
                            type="submit"
                            class="w-full bg-green-600 text-white py-3 px-4 rounded-lg font-semibold hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105"
                        >
                            Register
                        </button>
                        <p class="flex text-gray-400 justify-center items-center text-md">Already have an account? <a class="text-gray-500 hover:text-gray-400" href="{{ route('login') }}">&nbsp;Login</a></p>
                    </form>
                </div>
            </div>

            <!-- Right side - Logo -->
            <div class="w-full lg:w-1/2 flex justify-center">
                <div class="text-center">
                    <img src="{{ asset('img/SidoTanggapLogoNoBg.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg">
            {{ session('error') }}
        </div>
    @endif

    <script>
        // Auto-hide flash messages after 5 seconds
        setTimeout(() => {
            const messages = document.querySelectorAll('.fixed.bottom-4.right-4');
            messages.forEach(message => {
                message.style.opacity = '0';
                message.style.transform = 'translateX(100%)';
                setTimeout(() => message.remove(), 300);
            });
        }, 5000);
    </script>
</body>
</html>
