@extends('layouts.admin')

@section('content')
    <div class="bg-white rounded-lg shadow">
        <!-- Reports Section Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Assigned Reports</h3>
        </div>

        <!-- Filters -->
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex flex-wrap gap-4">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                        Category
                        <i class="fas fa-chevron-down ml-2 text-sm"></i>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition
                        class="absolute top-full left-0 mt-1 w-48 bg-white border rounded-lg shadow-lg z-10">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">All
                            Categories</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Environmental</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Wildlife</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Pollution</a>
                    </div>
                </div>

                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                        Status
                        <i class="fas fa-chevron-down ml-2 text-sm"></i>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition
                        class="absolute top-full left-0 mt-1 w-48 bg-white border rounded-lg shadow-lg z-10">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">All
                            Status</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Pending</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Confirmed</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Resolved</a>
                    </div>
                </div>

                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                        Date
                        <i class="fas fa-chevron-down ml-2 text-sm"></i>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition
                        class="absolute top-full left-0 mt-1 w-48 bg-white border rounded-lg shadow-lg z-10">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">All
                            Dates</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Today</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">This
                            Week</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">This
                            Month</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Lokasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Koordinat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Gambar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Deskripsi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Pelapor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($reports as $report)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $report->created_at->format('Y-m-d') }}</td>
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
                                @if (!$report->status_verified)
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Menunggu
                                    </span>
                                @elseif($report->status_verified && !$report->status_fixed)
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Terverifikasi
                                    </span>
                                @elseif($report->status_fixed)
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Selesai
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                @if (!$report->status_verified)
                                    <form action="{{ route('admin.reports.verify', $report->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-blue-600 hover:text-blue-800">Verifikasi</button>
                                    </form>
                                @endif

                                @if ($report->status_verified && !$report->status_fixed)
                                    <form action="{{ route('admin.reports.resolve', $report->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-green-600 hover:text-green-800">Selesai</button>
                                    </form>
                                @endif

                                @if ($report->status_fixed)
                                    <a href="{{ route('admin.articles.create', ['report' => $report->id]) }}"
                                        class="text-indigo-600 hover:text-indigo-800">
                                        Buat Artikel
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada laporan ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if (isset($reports) && method_exists($reports, 'links'))
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $reports->links() }}
            </div>
        @endif
    </div>
@endsection
