<div class="w-64 bg-white shadow-lg">
    <div class="p-6 border-b">
        <h1 class="text-lg font-semibold text-gray-800">SiD TANGGAP</h1>
        <p class="text-sm text-gray-600">{{ auth()->user()->name ?? 'User' }}</p>
    </div>

    <nav class="mt-6">
        <a href="{{ route('user.dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 bg-gray-100 border-r-4 border-green-500">
            <i class="fas fa-home mr-3"></i>
            Dashboard
        </a>
        <a href="{{ route('user.reports.index') }}" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100">
            <i class="fas fa-file-alt mr-3"></i>
            My Reports
        </a>
        <a href="{{ route('user.articles.index') }}" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100">
            <i class="fas fa-newspaper mr-3"></i>
            Articles
        </a>
        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="flex items-center w-full px-6 py-3 text-gray-600 hover:bg-gray-100">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Logout
            </button>
        </form>
    </nav>
</div>
