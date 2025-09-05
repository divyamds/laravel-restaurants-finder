@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2>Top Restaurants in {{ $city }}</h2>

    @if(!empty($restaurants) && count($restaurants) > 0)
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Rating</th>
                    <th>Map</th>
                </tr>
            </thead>
            <tbody>
                @foreach($restaurants as $restaurant)
                    <tr>
                        <td>{{ $restaurant['name'] }}</td>
                        <td>{{ $restaurant['address'] }}</td>
                        <td>{{ $restaurant['rating'] }}</td>
                        <td>
                            @if($restaurant['lat'] && $restaurant['lon'])
                                <a href="https://www.openstreetmap.org/?mlat={{ $restaurant['lat'] }}&mlon={{ $restaurant['lon'] }}#map=18/{{ $restaurant['lat'] }}/{{ $restaurant['lon'] }}"
                                   target="_blank" class="btn btn-sm btn-outline-primary">
                                    View on Map
                                </a>
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-danger">No restaurants found for {{ $city }}.</p>
    @endif

    <a href="{{ url('/restaurants') }}" class="btn btn-secondary mt-3">⬅ Back to Search</a>
</div>
@endsection
