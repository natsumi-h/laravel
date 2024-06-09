<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\UpdateRequest;
use App\Models\Restaurant;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request)
    {
        $restaurant = Restaurant::where('id', $request->id())->firstOrFail();
        $restaurant->content = $request->restaurant();
        $restaurant->save();
        return response()->json([
            'message' => 'Restaurant updated successfully.',
            'restaurant' => $restaurant
        ]);
    }
}
