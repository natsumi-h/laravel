<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RestaurantService;

class ShowController extends Controller
{
    public function __invoke(Request $request, RestaurantService $restaurantService)
    {
        $restaurantId = $request->route('restaurantId');
        $restaurant = $restaurantService->getRestaurant($restaurantId);
        return response()->json($restaurant);
    }
}
