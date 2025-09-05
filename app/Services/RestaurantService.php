<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RestaurantService
{
    protected $limit;

    public function __construct()
    {
        // Default limit: 10 restaurants
        $this->limit = config('services.osm.limit', 10);
    }

    public function searchRestaurants($city)
    {
        // Step 1: Geocode city → lat/lon (Nominatim requires User-Agent)
        $geo = Http::withHeaders([
            'User-Agent' => 'MyLaravelApp/1.0 (your_email@example.com)'
        ])->get("https://nominatim.openstreetmap.org/search", [
            'q' => $city,
            'format' => 'json',
            'limit' => 1,
        ])->json();

        if (empty($geo)) {
            return [[
                'name'    => '⚠️ City not found',
                'address' => '',
                'rating'  => '',
                'lat'     => null,
                'lon'     => null,
            ]];
        }

        $lat = $geo[0]['lat'];
        $lon = $geo[0]['lon'];

        // Step 2: Overpass query (15 km radius)
        $overpassQuery = "
            [out:json][timeout:25];
            (
              node[\"amenity\"=\"restaurant\"](around:15000,{$lat},{$lon});
              way[\"amenity\"=\"restaurant\"](around:15000,{$lat},{$lon});
              relation[\"amenity\"=\"restaurant\"](around:15000,{$lat},{$lon});
            );
            out center;
        ";

        $osmResponse = Http::withHeaders([
            'User-Agent' => 'MyLaravelApp/1.0 (your_email@example.com)'
        ])->withBody($overpassQuery, 'text/plain')
          ->post('https://overpass-api.de/api/interpreter');

        // Step 3: Handle errors
        if (!$osmResponse->ok()) {
            return [[
                'name'    => '⚠️ OSM request failed',
                'address' => '',
                'rating'  => '',
                'lat'     => null,
                'lon'     => null,
            ]];
        }

        $osmData = $osmResponse->json();

        // Debugging: if no results
        if (empty($osmData['elements'])) {
            \Log::warning("OSM returned no elements for city: {$city}", $osmData);
            return [[
                'name'    => '⚠️ No restaurants found (OSM)',
                'address' => '',
                'rating'  => '',
                'lat'     => null,
                'lon'     => null,
            ]];
        }

        // Step 4: Format results
        return collect($osmData['elements'])->take($this->limit)->map(function ($place) {
            return [
                'name'    => $place['tags']['name'] ?? 'Unnamed Restaurant',
                'address' => $place['tags']['addr:street'] ?? 'N/A',
                'rating'  => 'N/A (OSM)', // OSM doesn’t store ratings
                'lat'     => $place['lat'] ?? $place['center']['lat'] ?? null,
                'lon'     => $place['lon'] ?? $place['center']['lon'] ?? null,
            ];
        })->all();
    }
}
