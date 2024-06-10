<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Restaurant\IndexController;
use App\Http\Controllers\Restaurant\ShowController;
use App\Http\Controllers\Restaurant\CreateController;
use App\Http\Controllers\Restaurant\PutController;
use App\Http\Controllers\Restaurant\DeleteController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// RestaURant Routes Group
$restaurantNamespace = '\App\Http\Controllers\Restaurant';
Route::prefix('restaurant')->name('restaurant.')->namespace($restaurantNamespace)->group(function () {

    // Get all restaurants
    // /restaurant
    // Route::get('/', 'IndexController')->name('index');

    // Get all restaurants
    // /restaurant
    Route::get('/', [IndexController::class, '__invoke'])->name('index');


    // Get a single restaurant
    // /restaurant/{restaurantId}
    Route::get('/{restaurantId}', 'ShowController')
        ->name('show')
        ->where('restaurantId', '[0-9]+');

    // Create a restaurant
    // /restaurant/create
    Route::post('/create', 'CreateController')->name('create');

    // Update a restaurant
    // /restaurant/{restaurantId}
    Route::put('/{restaurantId}', 'PutController')
        ->name('update.put')
        ->where('restaurantId', '[0-9]+');

    // Delete a restaurant
    // /restaurant/{restaurantId}
    Route::delete('/{restaurantId}', 'DeleteController')
        ->name('delete');
});
