<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.weather.api_key'); // Ensure this matches your config
    }

    public function getWeather($city)
    {
        $url = "https://api.weatherapi.com/v1/current.json";
        $response = Http::get($url, [
            'key' => $this->apiKey,
            'q' => $city,
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        \Log::error('WeatherAPI error', ['response' => $response->body()]);
        return ['error' => 'Unable to fetch weather data.'];
    }
}
