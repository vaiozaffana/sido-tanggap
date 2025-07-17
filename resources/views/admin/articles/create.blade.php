@extends('layouts.admin')

@section('title', 'Buat Artikel')

@section('content')
    <div class="bg-white p-6 rounded shadow-md">
        <h2 class="text-xl font-semibold mb-4">Buat Artikel</h2>

        <div class="mb-4 p-4 bg-gray-100 rounded">
            <p><strong>Pelapor:</strong> {{ $report->user->name }}</p>
            <p><strong>Deskripsi:</strong> {{ $report->description }}</p>
            <p><strong>Koordinat:</strong> {{ $report->latitude }}, {{ $report->longitude }}</p>
            <img src="{{ asset('storage/' . $report->image_path) }}" alt="Foto Laporan" class="w-1/3 mt-2 rounded">
        </div>

        <form action="{{ route('admin.articles.store') }}" method="POST">
            @csrf
            <input type="hidden" name="report_id" value="{{ $report->id }}">

            <div class="mb-4">
                <label class="block font-medium">Judul Artikel</label>
                <input type="text" name="title" class="w-full border-gray-300 rounded mt-1 border" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Isi Artikel</label>
                <textarea name="content" rows="6" class="w-full border-gray-300 rounded mt-1 border" required></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Artikel</button>
        </form>
    </div>
@endsection
