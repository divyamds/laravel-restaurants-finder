<?php

use App\Http\Controllers\RestaurantController;

Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
Route::post('/restaurants/search', [RestaurantController::class, 'search'])->name('restaurants.search');
