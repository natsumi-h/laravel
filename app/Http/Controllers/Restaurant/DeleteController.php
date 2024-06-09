<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class DeleteController extends Controller
{
    public function __invoke(Request $request)
    {
        $restaurantId = (int) $request->route('restaurantId');
        $restaurant = Restaurant::where('id', $restaurantId)->first();
        $restaurant->delete();
        return redirect()
            ->route('restaurant.index')
            ->with('feedback.success', "Tweet deleted successfully.");
    }
}
