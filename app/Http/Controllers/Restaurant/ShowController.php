<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RestaurantService;

class ShowController extends Controller
{
    public function __invoke(Request $request, RestaurantService $restaurantService)
    {
        $restaurant = $restaurantService->getRestaurant($request->restaurant);
        return view('restaurant.show')
            ->with('restaurant', $restaurant);
    }
}
