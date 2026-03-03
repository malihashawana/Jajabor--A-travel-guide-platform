<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Location;
class LocationController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Fetch locations, with search functionality if needed
        $locations = Location::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('description', 'like', "%$search%");
            })
            ->get();

        // Pass the $locations variable to the view
        return view('locations.index', compact('locations'));
    }
    private function fetchLocationData($search)
    {
        // Define your API key and endpoint
        $apiKey = env('GOOGLE_PLACES_API_KEY'); // Store your API key in the .env file
        $endpoint = "https://maps.googleapis.com/maps/api/place/textsearch/json";

        // Build the query URL
        $url = $endpoint . "?query=" . urlencode($search) . "&key=" . $apiKey;

        // Use file_get_contents or Guzzle to fetch data
        $response = file_get_contents($url); // This makes a GET request to the API
        $data = json_decode($response, true); // Decode the JSON response into an array

        // Extract the relevant data (modify based on API response structure)
        $locations = [];
        if (isset($data['results'])) {
            foreach ($data['results'] as $result) {
                $locations[] = [
                    'name' => $result['name'],
                    'address' => $result['formatted_address'] ?? 'No address available',
                    'description' => $result['types'][0] ?? 'No description available',
                ];
            }
        }

        return $locations; // Return the processed data
    }

    private function fetchDefaultLocations()
    {
        // Example: Default data or an API call for popular locations
        return [
            ['name' => 'Paris', 'address' => 'France', 'description' => 'Eiffel Tower, Louvre Museum, etc.'],
            ['name' => 'Rome', 'address' => 'Italy', 'description' => 'Colosseum, Vatican City, etc.'],
        ];
    }
    public function show($id)
    {
        // Fetch location from database
        $location = Location::findOrFail($id);

        // Fetch additional details from Wikipedia
        $wikipediaUrl = 'https://en.wikipedia.org/w/api.php';
        $response = Http::get($wikipediaUrl, [
            'action' => 'query',
            'prop' => 'extracts',
            'format' => 'json',
            'titles' => $location->name,
            'exintro' => true,
            'explaintext' => true,
        ]);

        // Parse the Wikipedia response
        $page = collect($response->json()['query']['pages'])->first();
        $wikiExtract = $page['extract'] ?? 'No additional information available.';

        // Pass data to the view
        return view('locations.show', compact('location', 'wikiExtract'));
    }
    
}
