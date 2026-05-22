<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
{
    $productCount = Product::count();

    $categoryCount = Category::count();

    $lowStockCount = Product::where('stock', '<=', 2)
        ->where('stock', '>=', 0)
        ->count();

    $outOfStockCount = Product::where('stock', 0)
        ->count();

    $lowStockProducts = Product::where('stock', '<=', 2)
        ->where('stock', '>=', 0)
        ->get();

    return view('dashboard', compact(
        'productCount',
        'categoryCount',
        'lowStockCount',
        'outOfStockCount',
        'lowStockProducts'
    ));
}
}
