<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function showWeather(Request $request)
    {
        $city = $request->input('city', 'Dhaka'); // Default city
        $weather = $this->weatherService->getWeather($city);

        return view('weather', compact('weather', 'city'));
    }
}
