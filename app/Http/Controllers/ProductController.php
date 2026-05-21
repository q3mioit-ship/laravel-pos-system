<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $request->validate([
        'name' => 'required',
        'stock' => 'required|integer',
        'cost_price' => 'required|integer',
        'sale_price' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
    ]);
        Product::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'cost_price' => $request->cost_price,
            'sale_price' => $request->sale_price,
            'category_id' => $request->category_id,
        ]);

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'cost_price' => 'required|integer',
            'sale_price' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'cost_price' => $request->cost_price,
            'sale_price' => $request->sale_price,
        ]);

        return redirect('/products/' . $product->id);

    }

    /**
     * Remove the specified resource from storage.
     */ 
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/products');
    }
}
