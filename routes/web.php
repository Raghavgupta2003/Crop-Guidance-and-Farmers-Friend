<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\Admin\PestController;

// Home Page
Route::get('/', function () {
    return view('home');
});

// Crop Suggestions
// Route::get('/crop-suggestions', [CropController::class, 'getCropSuggestions'])->name('crop-suggestions');
Route::get('/crop-suggestions', [CropController::class, 'index'])->name('crop-suggestions');
Route::post('/get-states', [CropController::class, 'getStates'])->name('get-states');
Route::post('/get-districts', [CropController::class, 'getDistricts'])->name('get-districts');
Route::post('/get-seasons', [CropController::class, 'getSeasons'])->name('get-seasons');
Route::post('/get-crops', [CropController::class, 'getCrops'])->name('get-crops');

// Weather Forecast
Route::get('/weather', [WeatherController::class, 'getWeather']);

// Pest Alerts
Route::get('/alerts', [AlertController::class, 'getPestAlerts']);

// Admin Routes (No Middleware)
Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard'); // Admin dashboard view
    })->name('admin.dashboard');

    // Resource routes for pests
    Route::resource('pests', PestController::class);
});