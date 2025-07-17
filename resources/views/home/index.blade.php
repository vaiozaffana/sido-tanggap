@extends('layouts.app')

@section('content')
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
      <a href="{{ route('auth.page', ['mode' => 'login']) }}" class="px-8 py-3 rounded-lg border-2 border-white text-white hover:bg-white hover:text-emerald-900 font-semibold text-lg">Get Started</a>
    </div>
  </div>
</section>

<!-- Featured Reports -->
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-gray-800 mb-12">Featured Reports</h2>

    <div class="flex flex-col gap-12">
      @forelse($articles as $article)
        <div class="flex flex-col md:flex-row items-center gap-8">
          <div class="flex-1">
            <h3 class="text-xl font-bold text-gray-800 mb-4">{{ $article->title }}</h3>
            <p class="text-gray-600 mb-6">{{ Str::limit($article->report->description ?? '-', 150) }}</p>
            <a href="{{ route('articles.show', $article->id) }}"
              class="inline-flex items-center bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-medium">
              Read More
              <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
          <div class="flex-1">
            @if ($article->report && $article->report->image_path)
              <img class="w-full h-64 object-cover rounded-lg shadow-lg"
                src="{{ asset('storage/' . $article->report->image_path) }}"
                alt="{{ $article->title }}" />
            @else
              <div class="w-full h-64 flex items-center justify-center bg-gray-100 rounded-lg text-gray-400">
                No Image
              </div>
            @endif
          </div>
        </div>
      @empty
        <p class="text-gray-500">Belum ada artikel yang tersedia.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection
