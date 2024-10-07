<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);

Route::get('/', function () {
    return view('welcome');
});
