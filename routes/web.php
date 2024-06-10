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

// csrf token
// Route::get('/csrf-cookie', function () {
//     return response()->json([
//         'token' => csrf_token()
//     ]);
// });





require __DIR__ . '/auth.php';
