@php
    $default = request('page') == 'register' ? 'register' : 'login';
@endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIDO TANGGAP - Authentication</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>

@php
    $default = request('page') == 'register' ? 'register' : 'login';
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiD TANGGAP - {{ ucfirst($default) }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body x-data="{ page: '{{ $default }}' }" class="bg-gray-50 min-h-screen flex items-center justify-center">

    <div class="max-w-5xl w-full flex flex-col lg:flex-row items-center justify-center gap-12 px-4 py-12">

        <!-- Form Container -->
        <div class="relative w-full max-w-md h-[540px]">

            <!-- LOGIN FORM -->
            <div x-show="page === 'login'"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 translate-x-8"
                x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-x-0"
                x-transition:leave-end="opacity-0 -translate-x-8"
                class="absolute inset-0 bg-white shadow-lg rounded-lg p-8 z-10"
                x-cloak>

                <h2 class="text-2xl font-bold text-center text-gray-900 mb-20">Selamat Datang</h2>
                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                            placeholder="Masukkan Email" required>
                        @error('email')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                            placeholder="••••••••••" required>
                        @error('password')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 text-green-600 border-gray-300 rounded"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Remember Me</label>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition transform hover:scale-105">
                        Login
                    </button>
                </form>
                <p class="mt-4 text-sm text-center">Belum punya akun?
                    <button @click="page = 'register'" class="text-green-600 hover:underline">Daftar</button>
                </p>
            </div>

            <!-- REGISTER FORM -->
            <div x-show="page === 'register'"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 -translate-x-8"
                x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-x-0"
                x-transition:leave-end="opacity-0 translate-x-8"
                class="absolute inset-0 bg-white shadow-lg rounded-lg p-8 z-10"
                x-cloak>

                <h2 class="text-2xl font-bold text-center text-gray-900 mb-6">Selamat Datang</h2>
                <form action="{{ route('register') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Nama -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                            placeholder="Masukkan Nama" required>
                        @error('name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                            placeholder="Masukkan Email" required>
                        @error('email')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                            placeholder="••••••••••" required>
                        @error('password')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 text-green-600 border-gray-300 rounded"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Remember Me</label>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition transform hover:scale-105">
                        Register
                    </button>
                </form>
                <p class="mt-4 text-sm text-center">Sudah punya akun?
                    <button @click="page = 'login'" class="text-green-600 hover:underline">Login</button>
                </p>
            </div>
        </div>

        <!-- Logo -->
        <div class="w-full lg:w-1/2 flex justify-center">
            <img src="{{ asset('img/SidoTanggapLogoNoBg.png') }}" alt="Logo Sido Tanggap" class="w-64">
        </div>
    </div>

    <!-- Flash Message -->
    @if (session('success') || session('error'))
        <div class="fixed bottom-4 right-4 {{ session('success') ? 'bg-green-500' : 'bg-red-500' }} text-white px-6 py-3 rounded-lg shadow-lg transition-all">
            {{ session('success') ?? session('error') }}
        </div>
        <script>
            setTimeout(() => {
                const message = document.querySelector('.fixed.bottom-4');
                if (message) {
                    message.style.opacity = '0';
                    message.style.transform = 'translateX(100%)';
                    setTimeout(() => message.remove(), 300);
                }
            }, 5000);
        </script>
    @endif
</body>
</html>


</html>
