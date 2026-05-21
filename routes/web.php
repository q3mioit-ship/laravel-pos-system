<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hello');
});

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/{id}', [CategoryController::class, 'show']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create']);

Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/products/{id}/edit', [ProductController::class, 'edit']);

Route::put('/products/{id}', [ProductController::class, 'update']);

Route::delete('/products/{id}', [ProductController::class, 'destroy']);