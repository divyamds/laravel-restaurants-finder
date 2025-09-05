@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Card -->
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5 text-center">

                    <!-- Heading -->
                    <h1 class="mb-4 fw-bold text-primary">
                        🍽️ Discover Top Restaurants
                    </h1>
                    <p class="text-muted mb-4">
                        Enter your city below to explore the best places to eat!
                    </p>

                    <!-- Form -->
                    <form action="{{ route('restaurants.search') }}" method="POST" class="mt-3">
                        @csrf
                        <div class="input-group input-group-lg">
                            <input 
                                type="text" 
                                id="city" 
                                name="city" 
                                class="form-control rounded-start-4" 
                                placeholder="e.g. Pune, Mumbai, Hyderabad" 
                                required
                            >
                            <button class="btn btn-primary px-4 rounded-end-4" type="submit">
                                🔍 Search
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
