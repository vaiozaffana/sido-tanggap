@extends('layouts.app')

@section('content')
    {{-- Full layout for user dashboard --}}
    <div class="flex min-h-screen bg-gray-100">
        @include('components.sidebar')

        <div class="flex-1 p-6">
            @include('components.header', [
                'title' => 'User Dashboard',
                'buttonText' => 'Create Report',
                'buttonRoute' => route('user.reports.create'),
            ])

            @include('components.stats-cards', [
                'totalReports' => $totalReports,
                'pendingReports' => $pendingReports,
                'resolvedReports' => $resolvedReports,
            ])

            <div class="mt-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Laporan Terbaru</h2>

                @forelse ($recentReports as $report)
                    <div class="p-6 bg-white rounded-lg shadow-md mb-6 border border-gray-200">
                        {{-- Info Lokasi dan Deskripsi --}}
                        <div class="mb-3">
                            @if ($report->image_path)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $report->image_path) }}" alt="Foto Laporan"
                                        class="rounded-lg w-40 border">
                                </div>
                            @endif

                            @if ($report->latitude && $report->longitude)
                                <p class="mt-2 text-gray-600">
                                    <strong>🌐 Koordinat:</strong> {{ $report->latitude }}, {{ $report->longitude }}
                                </p>
                            @endif
                            <h3 class="font-semibold text-gray-700">📍 Lokasi: {{ $report->location_detail }}
                            </h3>
                            <p class="text-gray-600"><strong>📝 Deskripsi:</strong> {{ $report->description }}</p>
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <strong>Status:</strong>
                            @if ($report->status_fixed)
                                <span
                                    class="inline-block bg-green-100 text-green-700 text-sm px-2 py-1 rounded">Selesai</span>
                            @elseif ($report->status_verified)
                                <span
                                    class="inline-block bg-yellow-100 text-yellow-700 text-sm px-2 py-1 rounded">Terverifikasi</span>
                            @else
                                <span class="inline-block bg-red-100 text-red-700 text-sm px-2 py-1 rounded">Menunggu</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada laporan terbaru.</p>
                @endforelse
            </div>

        </div>
    </div>
@endsection
