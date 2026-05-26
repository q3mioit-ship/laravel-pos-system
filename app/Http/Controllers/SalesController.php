<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
     public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $product = Product::findOrFail($validated['product_id']);

        if ($product->stock < $validated['quantity']) {
            return back()
                ->withErrors([
                    'quantity' => '在庫数を超えています。',
                ])
                ->withInput();
        }

        Sale::create([
            'product_id' => $product->id,
            'quantity' => $validated['quantity'],
            'unit_price' => $product->sale_price,
            'sold_at' => now(),
        ]);

        $product->decrement('stock', $validated['quantity']);

        return redirect()
            ->route('sales.index')
            ->with('success', '売上を登録しました');
    }

    public function index()
    {
        $sales = Sale::with('product')
            ->latest('sold_at')
            ->paginate(10);

        return view('sales.index', compact('sales'));
    }
}
