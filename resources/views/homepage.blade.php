<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SidoTanggap - Environmental Reporting Platform</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-gray-50 text-gray-800 leading-relaxed">
  <!-- Navigation -->
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
          <a href="#" class="px-4 py-2 rounded-md text-white bg-emerald-500 hover:bg-emerald-600 text-sm font-medium">Login</a>
          <a href="#" class="px-4 py-2 rounded-md text-gray-700 hover:text-emerald-500 text-sm font-medium">Register</a>
        </div>

        <button class="md:hidden p-2">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="relative bg-gradient-to-br from-emerald-900 via-gray-700 to-gray-800 text-white py-24 overflow-hidden">
    <div class="absolute top-20 right-20 w-96 h-96 bg-gray-600 bg-opacity-20 rounded-full transform rotate-12 z-0 hidden md:block"></div>
    <div class="absolute bottom-20 left-20 w-64 h-64 bg-yellow-400 bg-opacity-10 rounded-lg transform -rotate-12 z-0 hidden md:block"></div>

    <div class="absolute inset-0 flex items-center justify-center opacity-10 z-0">
      <div class="text-center text-6xl font-light italic leading-snug hidden sm:block">
        Community<br />problems<br />Safe Work
      </div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-6">Report Environmental and Social Issues</h1>
      <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
        SidoTanggap is a platform for reporting environmental and social issues in your community. Help us make a difference by reporting issues and contributing to solutions.
      </p>
      <div class="flex flex-wrap gap-4 justify-center">
        <a href="#" class="px-8 py-3 rounded-lg border-2 border-white text-white hover:bg-white hover:text-emerald-900 font-semibold text-lg">Get Started</a>
      </div>
    </div>
  </section>

  <!-- Featured Reports -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-3xl font-bold text-gray-800 mb-12">Featured Reports</h2>
      <div class="flex flex-col gap-12">
        <!-- Report Item -->
        <div class="flex flex-col md:flex-row items-center gap-8">
          <div class="flex-1">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Water Pollution in the River</h3>
            <p class="text-gray-600 mb-6">A report on the increasing levels of pollution in the river, affecting local communities and wildlife.</p>
            <a href="#" class="inline-flex items-center bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-medium">
              Read More
              <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
          <div class="flex-1">
            <img class="w-full h-64 object-cover rounded-lg shadow-lg" src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=1000&q=80" alt="Water Pollution" />
          </div>
        </div>
        <!-- Duplicated Report Items can be copied -->
        <!-- ... -->
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid gap-8 md:grid-cols-3 mb-8">
        <div>
          <div class="text-2xl font-bold mb-2">
            <span class="text-emerald-500">SIDO</span><span class="text-yellow-400">TANGGAP</span>
          </div>
          <p class="text-gray-400">Empowering communities to report and address environmental and social issues for a better future.</p>
        </div>
        <div>
          <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
          <ul class="space-y-2 text-gray-400">
            <li><a href="#" class="hover:text-white">Home</a></li>
            <li><a href="#" class="hover:text-white">Reports</a></li>
            <li><a href="#" class="hover:text-white">News</a></li>
            <li><a href="#" class="hover:text-white">Contact</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-lg font-semibold mb-4">Legal</h3>
          <ul class="space-y-2 text-gray-400">
            <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
            <li><a href="#" class="hover:text-white">Terms of Service</a></li>
            <li><a href="#" class="hover:text-white">Contact Us</a></li>
          </ul>
        </div>
      </div>
      <div class="border-t border-gray-700 pt-6 flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="flex space-x-6 text-gray-400">
          <!-- Icons placeholder -->
          <a href="#" class="hover:text-white"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953..." /></svg></a>
          <!-- Add more if needed -->
        </div>
        <p class="text-sm text-gray-400">© 2024 SidoTanggap. All rights reserved.</p>
      </div>
    </div>
  </footer>
</body>

</html>
