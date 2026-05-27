<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\Customer;

class SalesController extends Controller
{
     public function create()
    {
        $products = Product::orderBy('id')->get();

        $customers = Customer::orderBy('id')->get();

        return view('sales.create', compact(
        'products',
        'customers'
    ));
    }

    public function store(Request $request)
    
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
            'customer_id' => ['nullable', 'exists:customers,id'],

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
            'customer_id' => $validated['customer_id'] ?? null,
        ]);

        $product->decrement('stock', $validated['quantity']);

        return redirect()
            ->route('sales.index')
            ->with('success', '売上を登録しました');
    }

    public function index()
    {
        $sales = Sale::with([
            'product',
            'customer'
        ])
        ->latest()
        ->paginate(10);

        return view('sales.index', compact('sales'));
    }
}
