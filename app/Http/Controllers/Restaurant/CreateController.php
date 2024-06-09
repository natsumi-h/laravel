<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\CreateRequest;
use App\Models\Restaurant;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        $restaurant = Restaurant::create([
            // 'user_id' => auth()->id(),
            'user_id' => 1,
            'name' => $request->name(),
            'image' => $request->image(),
            'category' => $request->category(),
            'description' => $request->description(),
            'address' => $request->address(),
            'phone' => $request->phone(),
            'maxPax' => $request->maxPax(),
        ]);

        return response()->json([
            'message' => 'Restaurant created successfully.',
            'restaurant' => $restaurant,
        ]);
    }
}
