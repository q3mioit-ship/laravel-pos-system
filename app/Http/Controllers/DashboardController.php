<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


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

    $todaySalesAmount = Sale::whereDate('sold_at', Carbon::today())
        ->sum(DB::raw('quantity * unit_price'));

    $monthlySalesAmount = Sale::whereMonth('sold_at', Carbon::now()->month)
        ->whereYear('sold_at', Carbon::now()->year)
        ->sum(DB::raw('quantity * unit_price'));

    $yearlySalesAmount = Sale::whereYear('sold_at', Carbon::now()->year)
        ->sum(DB::raw('quantity * unit_price'));
    
    $monthlySales = Sale::selectRaw('strftime("%m", sold_at) as month')
    ->selectRaw('SUM(quantity * unit_price) as total')
    ->whereYear('sold_at', Carbon::now()->year)
    ->groupBy('month')
    ->orderBy('month')
    ->get();

    return view('dashboard', compact(
        'productCount',
        'categoryCount',
        'lowStockCount',
        'outOfStockCount',
        'lowStockProducts',
        'todaySales',
        'popularProducts',
        'todaySalesAmount',
        'monthlySalesAmount',
        'yearlySalesAmount',
        'monthlySales',

    ));
}
}
