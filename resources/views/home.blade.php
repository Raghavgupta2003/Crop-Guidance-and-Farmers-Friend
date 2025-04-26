@extends('layouts.app')

@section('content')
    <div class="text-center space-y-6">
        <h2 class="text-3xl font-semibold">Welcome to Crop Advisory & Farmer's Companion</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Get the best crop suggestions, weather forecasts, and pest attack alerts for your region.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
            <a href="/crop-suggestions" class="bg-green-100 p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h3 class="text-xl font-bold">🌾 Crop Suggestions</h3>
                <p class="text-gray-600 mt-2">Based on season and weather forecasts.</p>
            </a>
            <a href="/weather" class="bg-blue-100 p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h3 class="text-xl font-bold">🌦️ Weather Forecast</h3>
                <p class="text-gray-600 mt-2">Get rainfall and weather warnings.</p>
            </a>
            <a href="/alerts" class="bg-red-100 p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h3 class="text-xl font-bold">🐛 Pest Alerts</h3>
                <p class="text-gray-600 mt-2">Stay safe from potential pest attacks.</p>
            </a>
        </div>
    </div>
@endsection
