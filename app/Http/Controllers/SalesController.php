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
            'product_id' => ['required', 'array'],
            'product_id.*' => ['required', 'exists:products,id'],

            'quantity' => ['required', 'array'],
            'quantity.*' => ['required', 'integer', 'min:1'],

            'customer_id' => ['nullable', 'exists:customers,id'],
        ]);
        if (count($validated['product_id']) !== count(array_unique($validated['product_id']))) {

            return back()
                ->withErrors([
                    'product_id' => '同じ商品が重複して選択されています。',
                ])
                ->withInput();
        }
        foreach ($validated['product_id'] as $index => $productId) {

            $product = Product::findOrFail($productId);

            $quantity = $validated['quantity'][$index];

            if ($product->stock < $quantity) {
                return back()
                    ->withErrors([
                        'quantity' => "{$product->name} の在庫数を超えています。",
                    ])
                    ->withInput();
            }
        }

        foreach ($validated['product_id'] as $index => $productId) {

            $product = Product::findOrFail($productId);

            $quantity = $validated['quantity'][$index];

            Sale::create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'unit_price' => $product->sale_price,
                'sold_at' => now(),
                'customer_id' => $validated['customer_id'] ?? null,
            ]);

            $product->decrement('stock', $quantity);
        }

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
