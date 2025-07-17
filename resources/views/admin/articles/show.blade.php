@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow-md mt-6">
    {{-- Judul --}}
    <h1 class="text-3xl font-bold mb-2">{{ $article->title }}</h1>

    {{-- Waktu & Penulis --}}
    <div class="text-sm text-gray-600 mb-4">
        Dipublikasikan: {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }} |
        Penulis: {{ $article->report->user->name ?? '-' }}
    </div>

    {{-- Gambar Artikel --}}
    @if ($article->report->image_path)
        <div class="my-6">
            <img src="{{ asset('storage/' . $article->report->image_path) }}" alt="Gambar Artikel"
                class="w-full rounded-md object-cover">
        </div>
    @endif

    {{-- Isi Artikel --}}
    <div class="prose prose-lg max-w-none leading-relaxed">
        {!! nl2br(e($article->content)) !!}
    </div>
</div>
@endsection
