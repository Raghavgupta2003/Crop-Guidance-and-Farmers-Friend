<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    // This function fetches weather data for a specific region
    public function getWeather(Request $request)
    {
        // Get the selected region (could be state, district, or city)
        $region = $request->input('region');
        
        // Check if region is provided
        if (!$region) {
            return view('weather', ['error' => 'Please select a region']);
        }

        // Use Guzzle to fetch weather data from an API (example using OpenWeatherMap)
        $client = new Client();
        $apiKey = 'fc9585a08a3acb620b9242d25b81fecc'; // Replace with your API key from OpenWeatherMap
        $response = $client->get("https://api.openweathermap.org/data/2.5/weather?q={$region}&appid={$apiKey}&units=metric");

        // Decode the JSON response
        $weatherData = json_decode($response->getBody(), true);

        // Check if the data exists and handle errors
        if (isset($weatherData['main'])) {
            $temperature = $weatherData['main']['temp'];
            $weatherDescription = $weatherData['weather'][0]['description'];
            return view('weather', compact('temperature', 'weatherDescription', 'region'));
        } else {
            return view('weather', ['error' => 'No weather data found for the given region.']);
        }
    }
}
