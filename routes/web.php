<?php

use App\Http\Controllers\BookTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/book-types',[BookTypeController::class, 'index']);

Route::resource('book-types',BookTypeController::class);