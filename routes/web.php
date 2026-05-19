<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hello');
});

use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create']);

Route::post('/products', [ProductController::class, 'store']);