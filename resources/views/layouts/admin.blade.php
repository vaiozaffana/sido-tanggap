<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }} - SidoTanggap</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-6">
                <h1 class="text-lg font-semibold text-gray-800">SidoTanggap Admin</h1>
                <p class="text-sm text-gray-600">Welcome, {{ auth()->user()->name ?? 'User' }}!</p>
            </div>

            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center px-6 py-3 text-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 border-r-4 border-blue-500' : 'hover:bg-gray-100 hover:text-gray-700' }}">
                    <i class="fas fa-home mr-3"></i> Dashboard
                </a>

                <a href="{{ route('admin.reports') }}"
                   class="flex items-center px-6 py-3 text-gray-700 {{ request()->routeIs('admin.reports') ? 'bg-gray-100 border-r-4 border-blue-500' : 'hover:bg-gray-100 hover:text-gray-700' }}">
                    <i class="fas fa-file-alt mr-3"></i> Reports
                </a>

                <a href="{{ route('admin.articles.index') }}"
                   class="flex items-center px-6 py-3 text-gray-700 {{ request()->routeIs('admin.articles.*') ? 'bg-gray-100 border-r-4 border-blue-500' : 'hover:bg-gray-100 hover:text-gray-700' }}">
                    <i class="fas fa-newspaper mr-3"></i> Articles
                </a>

                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-6 py-3 text-gray-600 hover:bg-gray-100">
                        <i class="fas fa-sign-out-alt mr-3"></i> Logout
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b">
                <div class="px-6 py-4">
                    <h2 class="text-2xl font-bold text-gray-800">
                        {{ $title ?? 'Admin Panel' }}
                    </h2>
                </div>
            </header>

            <!-- Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Toast Notifications -->
    @if (session('success'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <script>
        setTimeout(() => {
            const toasts = document.querySelectorAll('.fixed.bottom-4.right-4');
            toasts.forEach(toast => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                setTimeout(() => toast.remove(), 300);
            });
        }, 5000);
    </script>
</body>
</html>
