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
    public function index(Request $request)
    {
         $query = Product::query();

        if ($request->filled('keyword')) {

        $query->where(
            'name',
            'like',
            '%' . $request->keyword . '%'
            );
        }
        $products = $query->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate(
        [
            'name' => 'required',
            'stock' => 'required|integer',
            'cost_price' => 'required|integer',
            'sale_price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ],
        [],
        [
            'name' => '商品名',
            'stock' => '在庫数',
            'cost_price' => '仕入価格',
            'sale_price' => '販売価格',
            'category_id' => 'カテゴリ',
        ]
    );

    Product::create([
        'name' => $request->name,
        'stock' => $request->stock,
        'cost_price' => $request->cost_price,
        'sale_price' => $request->sale_price,
        'category_id' => $request->category_id,
    ]);

    return redirect('/products')
        ->with('success', '商品を登録しました');
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
        $categories = Category::orderBy('name')->get();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'stock' => 'required|integer',
            'cost_price' => 'required|integer',
            'sale_price' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'stock' => $request->stock,
            'cost_price' => $request->cost_price,
            'sale_price' => $request->sale_price,
        ]);

         return redirect()
        ->route('products.show', $product->id)
        ->with('success', '商品を更新しました');
    }
    public function increaseStock(Product $product)
    {
        $product->stock = $product->stock + 1;
        $product->save();

        return redirect()
            ->route('products.show', $product->id)
            ->with('success', '在庫を追加しました');
    }
    public function decreaseStock(Request $request, Product $product)
    {
        $qty = $request->input('quantity', 1);

        if ($product->stock < $qty) {
            return back()->with('error', '在庫が不足しています');
        }

        $product->decrement('stock', $qty);

        return redirect()
            ->route('products.show', $product->id)
            ->with('success', '在庫を減らしました');
    }
    /**
     * Remove the specified resource from storage.
     */ 
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/products')
            ->with('success', '商品を削除しました。');
    }
}
