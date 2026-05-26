<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with('product')
            ->latest('purchased_at')
            ->paginate(10);

        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('purchases.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $product = Product::findOrFail($validated['product_id']);

        Purchase::create([
            'product_id' => $product->id,
            'quantity' => $validated['quantity'],
            'purchased_at' => now(),
        ]);

        $product->increment('stock', $validated['quantity']);

        return redirect()
            ->route('purchases.index')
            ->with('success', '仕入を登録しました');
    }
}