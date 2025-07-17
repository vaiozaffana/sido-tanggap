@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Submit a Report</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.reports.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Upload Images -->
        <div>
            <label class="block font-semibold">Upload Images</label>
            <input type="file" name="image" accept="image/*" class="mt-2" required>
        </div>

        <!-- Select Location Map -->
        <div>
            <label class="block font-semibold mb-2">Select Location</label>
            <div id="map" class="w-full h-64 mb-2 rounded shadow"></div>

            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">

            <input type="text" name="location_detail" placeholder="Detail lokasi" class="w-full p-2 border rounded" required>
        </div>

        <!-- Describe Issue -->
        <div>
            <label class="block font-semibold">Describe the Issue</label>
            <textarea name="description" rows="4" class="w-full p-2 border rounded" required></textarea>
        </div>

        <!-- Select Category -->
        <div>
            <label class="block font-semibold">Report Category</label>
            <select name="category_id" class="w-full p-2 border rounded" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded">Submit</button>
    </form>
</div>

<!-- LeafletJS Map -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    const map = L.map('map').setView([-7.4465, 112.7181], 14); // Sidoarjo center

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    let marker;

    map.on('click', function(e) {
        const { lat, lng } = e.latlng;
        if (marker) map.removeLayer(marker);
        marker = L.marker([lat, lng]).addTo(map);
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    });
</script>
@endsection
