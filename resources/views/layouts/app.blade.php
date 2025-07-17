<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SidoTanggap - Environmental Reporting Platform</title>
   <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-50 text-gray-800 leading-relaxed">

    @include('partials.navbar')

    <main>
      @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
