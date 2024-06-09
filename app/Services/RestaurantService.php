<?php

namespace App\Services;

use App\Models\Restaurant;

class RestaurantService
{
    public function getRestaurants()
    {
        return Restaurant::orderBy('created_at', 'DESC')->get();
    }


    public function getRestaurant($id)
    {
        return Restaurant::find($id);
    }
}
