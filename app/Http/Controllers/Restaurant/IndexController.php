<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Services\RestaurantService;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RestaurantService $restaurantService)
    {
        $restaurants = $restaurantService->getRestaurants();
        return response()->json([
            'restaurants' => $restaurants
        ]);
    }
}
