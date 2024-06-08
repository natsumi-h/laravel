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

// Tweet
// Invokableなのでクラス名だけで指定できる。showメソッドは不要
Route::get(
    '/tweet',
    \App\Http\Controllers\Tweet\IndexController::class
)->name('tweet.index');

Route::post(
    '/tweet/create',
    \App\Http\Controllers\Tweet\CreateController::class
)
    ->middleware('auth')
    ->name('tweet.create');

Route::get(
    'tweet/update/{tweetId}',
    \App\Http\Controllers\Tweet\Update\IndexController::class
)->name('tweet.update.index')->where('tweetId', '[0-9]+');

Route::put(
    'tweet/update/{tweetId}',
    \App\Http\Controllers\Tweet\Update\PutController::class
)->name('tweet.update.put')->where('tweetId', '[0-9]+');


Route::delete(
    'tweet/delete/{tweetId}',
    \App\Http\Controllers\Tweet\DeleteController::class
)->name('tweet.delete');

require __DIR__ . '/auth.php';
