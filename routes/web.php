<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample', [\App\Http\Controllers\Sample\IndexController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Tweet Routes Group
Route::prefix('tweet')->name('tweet.')->group(function () {
    Route::get('/', \App\Http\Controllers\Tweet\IndexController::class)->name('index');

    Route::middleware('auth')->group(function () {
        Route::post('/create', \App\Http\Controllers\Tweet\CreateController::class)->name('create');
        Route::get('/update/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class)
            ->name('update.index')
            ->where('tweetId', '[0-9]+');
        Route::put('/update/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class)
            ->name('update.put')
            ->where('tweetId', '[0-9]+');
        Route::delete('/delete/{tweetId}', \App\Http\Controllers\Tweet\DeleteController::class)
            ->name('delete');
    });
});


// RestaURant Routes Group
$restaurantNamespace = '\App\Http\Controllers\Restaurant';
Route::prefix('restaurant')->name('restaurant.')->namespace($restaurantNamespace)->group(function () {

    // Get all restaurants
    // /restaurant
    Route::get('/', 'IndexController')->name('index');

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

require __DIR__ . '/auth.php';
