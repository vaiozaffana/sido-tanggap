<header class="bg-white shadow-sm border-b">
    <div class="px-6 py-4 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ $title }}</h2>
            <p class="text-gray-600">Welcome back, {{ auth()->user()->name ?? 'User' }}!</p>
        </div>
        <a href="{{ $buttonRoute }}" class="bg-green-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-green-700">
            <i class="fas fa-plus mr-2"></i>
            {{ $buttonText }}
        </a>
    </div>
</header>
