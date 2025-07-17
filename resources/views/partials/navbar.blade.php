<nav class="bg-white shadow border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex justify-between items-center h-16">
        <div class="text-2xl font-bold">
          <span class="text-emerald-500">SIDO</span><span class="text-yellow-400">TANGGAP</span>
        </div>

        <ul class="hidden md:flex space-x-8 font-medium">
          <li><a href="#" class="text-gray-700 hover:text-emerald-500">Home</a></li>
          <li><a href="#" class="text-gray-700 hover:text-emerald-500">News</a></li>
          <li><a href="#" class="text-gray-700 hover:text-emerald-500">Report</a></li>
          <li><a href="#" class="text-gray-700 hover:text-emerald-500">Contact</a></li>
        </ul>

        <div class="hidden md:flex space-x-4 items-center">
          <a href="{{ route('auth.page') }}" class="px-4 py-2 rounded-md text-white bg-emerald-500 hover:bg-emerald-600 text-sm font-medium">Login</a>
          <a href="{{ route('auth.page') }}" class="px-4 py-2 rounded-md text-gray-700 hover:text-emerald-500 text-sm font-medium">Register</a>
        </div>

        <button class="md:hidden p-2">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
  </nav>
