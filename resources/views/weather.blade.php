@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow w-full max-w-md mx-auto">
    <h1 class="text-2xl font-bold text-center mb-6">🌤 Weather Information</h1>

    <!-- Weather Form -->
    <form method="GET" action="/weather" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Region</label>
            <input type="text" name="region" class="mt-1 block w-full p-2 border border-gray-300 rounded" placeholder="Enter city/region">
        </div>

        <div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                Get Weather
            </button>
        </div>
    </form>

    <!-- Display Weather Info -->
    @if(isset($temperature))
        <div class="mt-6 bg-blue-50 p-4 rounded">
            <h2 class="text-lg font-semibold mb-2">Weather for {{ $region }}:</h2>
            <p>Temperature: {{ $temperature }}°C</p>
            <p>Condition: {{ $weatherDescription }}</p>
        </div>
    @elseif(isset($error))
        <div class="mt-6 bg-red-50 p-4 rounded">
            <p class="text-red-800">{{ $error }}</p>
        </div>
    @endif
</div>
@endsection
