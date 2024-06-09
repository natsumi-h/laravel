<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RestaurantService;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, RestaurantService $restaurantService)
    {
        $restaurants = $restaurantService->getRestaurants();
        return response()->json([
            'restaurants' => $restaurants
        ]);
    }
}
