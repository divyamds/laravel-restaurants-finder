<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RestaurantService;

class RestaurantController extends Controller
{
    protected $service;

    public function __construct(RestaurantService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('restaurants.index');
    }

    public function search(Request $request)
    {
        $city = $request->input('city');
        $restaurants = $this->service->searchRestaurants($city);

        return view('restaurants.results', compact('restaurants', 'city'));
    }
}
