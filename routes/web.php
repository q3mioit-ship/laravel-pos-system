<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hello');
});

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\CustomerController;

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/categories/{id}', [CategoryController::class, 'show']);

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create');

Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/products/{id}/edit', [ProductController::class, 'edit']);

Route::put('/products/{id}', [ProductController::class, 'update']);

Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/sales/create', [SalesController::class, 'create'])
    ->name('sales.create');

Route::post('/sales', [SalesController::class, 'store'])
    ->name('sales.store');

Route::get('/sales', [SalesController::class, 'index'])
    ->name('sales.index');

Route::get('/purchases', [PurchaseController::class, 'index'])
    ->name('purchases.index');

Route::get('/purchases/create', [PurchaseController::class, 'create'])
    ->name('purchases.create');

Route::post('/purchases', [PurchaseController::class, 'store'])
    ->name('purchases.store');

Route::resource('customers', CustomerController::class);