<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hello');
});

use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);