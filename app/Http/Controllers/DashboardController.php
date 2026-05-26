<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sale;

class DashboardController extends Controller
{
    public function index()
{
    $productCount = Product::count();

    $categoryCount = Category::count();
    
    $todaySales = Sale::with('product')
        ->whereDate('sold_at', today())
        ->latest('sold_at')
        ->get();

    $lowStockCount = Product::where('stock', '<=', 2)
        ->where('stock', '>=', 0)
        ->count();

    $outOfStockCount = Product::where('stock', 0)
        ->count();

    $lowStockProducts = Product::where('stock', '<=', 2)
        ->where('stock', '>=', 0)
        ->get();

    $popularProducts = Sale::selectRaw('product_id, SUM(quantity) as total_quantity')
        ->with('product')
        ->groupBy('product_id')
        ->orderByDesc('total_quantity')
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'productCount',
        'categoryCount',
        'lowStockCount',
        'outOfStockCount',
        'lowStockProducts',
        'todaySales',
        'popularProducts',
    ));
}
}
