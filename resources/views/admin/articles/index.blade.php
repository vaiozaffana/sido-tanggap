@extends('layouts.admin')

@section('title', 'Daftar Artikel')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Daftar Artikel</h2>
            <a href="{{ route('admin.articles.create') }}"
                class="inline-block px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                Buat Artikel
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-600">Judul</th>
                        <th class="px-4 py-2 text-left text-gray-600">Deskripsi Laporan</th>
                        <th class="px-4 py-2 text-left text-gray-600">Gambar</th>
                        <th class="px-4 py-2 text-left text-gray-600">Tanggal Dibuat</th>
                        <th class="px-4 py-2 text-left text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($articles as $article)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $article->title }}</td>

                            <td class="px-4 py-3 text-gray-700">
                                {{ $article->report->description ?? '-' }}
                            </td>

                            <td class="px-4 py-3">
                                @if ($article->report && $article->report->image_path)
                                    <img src="{{ asset('storage/' . $article->report->image_path) }}"
                                        class="w-16 h-16 object-cover rounded" alt="Gambar Laporan">
                                @else
                                    <span class="text-gray-400 italic">Tidak ada</span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-gray-600">{{ $article->created_at->format('Y-m-d') }}</td>

                            <td class="px-4 py-3 space-x-2">
                                <a href="{{ route('admin.articles.show', $article->id) }}"
                                    class="text-blue-600 hover:underline">Lihat</a>

                                {{-- Tambahkan tombol edit/hapus jika dibutuhkan --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500">Belum ada artikel.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        {{-- <div class="mt-4">
            {{ $articles->links() }}
        </div> --}}
    </div>
@endsection
