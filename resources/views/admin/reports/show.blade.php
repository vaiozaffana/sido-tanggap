@extends('layouts.admin')

@section('content')
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Laporan Selesai</h3>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Koordinat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelapor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($reports as $report)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $report->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $report->location_detail }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-800">
                                    {{ $report->latitude }}, {{ $report->longitude }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($report->image_path)
                                    <img src="{{ asset('storage/' . $report->image_path) }}" alt="Gambar Laporan"
                                        class="w-20 h-20 object-cover rounded">
                                @else
                                    <span class="text-gray-500 text-sm">Tidak ada</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-normal text-sm">
                                {{ $report->description }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                {{ $report->user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Selesai
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.articles.create', ['report' => $report->id]) }}"
                                    class="text-indigo-600 hover:text-indigo-800">
                                    Buat Artikel
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500">Tidak ada laporan selesai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{-- @if ($reports->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $reports->links() }}
            </div>
        @endif --}}
    </div>
@endsection
