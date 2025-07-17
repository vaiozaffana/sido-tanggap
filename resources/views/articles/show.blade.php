@extends('layouts.app')

@section('content')
<section class="py-12 bg-white">
  <div class="max-w-4xl mx-auto px-4">
    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ $article->title }}</h1>

    <div class="flex items-center text-sm text-gray-500 mb-6">
      <span class="mr-4">
        <strong>Dipublikasikan:</strong>
        {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}
      </span>
      @if($article->report && $article->report->user)
        <span><strong>Pelapor:</strong> {{ $article->report->user->name }}</span>
      @endif
    </div>

    @if($article->report && $article->report->image_path)
      <div class="mb-8">
        <img class="w-full rounded-lg shadow-md" src="{{ asset('storage/' . $article->report->image_path) }}" alt="{{ $article->title }}">
      </div>
    @endif

    @if($article->report)
      <div class="text-gray-700 text-lg leading-relaxed mb-8">
        <p>{{ $article->report->description }}</p>
      </div>
    @endif

    <div class="prose prose-lg max-w-none">
      {!! nl2br(e($article->content)) !!}
    </div>
  </div>
</section>

<div class="mt-10 text-center">
  <a href="{{ url('/') }}" class="text-emerald-700 hover:underline">&larr; Kembali ke Beranda</a>
</div>

@endsection
