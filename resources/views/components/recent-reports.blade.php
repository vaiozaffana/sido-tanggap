<section class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Reports</h3>

    @if ($reports->isEmpty())
        <p class="text-gray-500">No reports available.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Title</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Date</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($reports as $report)
                        <tr>
                            <td class="px-6 py-4 text-gray-800">{{ $report->title }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $statusColor = match($report->status) {
                                        'pending' => 'bg-yellow-100 text-yellow-700',
                                        'in_progress' => 'bg-blue-100 text-blue-700',
                                        'resolved' => 'bg-green-100 text-green-700',
                                        default => 'bg-gray-100 text-gray-700',
                                    };
                                @endphp
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                    {{ ucfirst(str_replace('_', ' ', $report->status)) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $report->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('reports.show', $report->id) }}" class="text-green-600 hover:underline">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</section>
