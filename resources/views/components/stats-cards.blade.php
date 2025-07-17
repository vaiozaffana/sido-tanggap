<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    @include('components.stat-card', ['title' => 'Total Reports', 'icon' => 'fa-file-alt', 'color' => 'blue', 'value' => $totalReports])
    @include('components.stat-card', ['title' => 'Pending', 'icon' => 'fa-clock', 'color' => 'yellow', 'value' => $pendingReports])
    @include('components.stat-card', ['title' => 'Resolved', 'icon' => 'fa-check-circle', 'color' => 'green', 'value' => $resolvedReports])
</div>
