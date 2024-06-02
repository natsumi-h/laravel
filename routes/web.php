<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample', [\App\Http\Controllers\Sample\IndexController::class, 'show']);

// Invokableなのでクラス名だけで指定できる。showメソッドは不要
Route::get(
    '/tweet',
    \App\Http\Controllers\Tweet\IndexController::class
);
