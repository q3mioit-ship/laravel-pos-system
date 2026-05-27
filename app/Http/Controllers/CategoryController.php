<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id')->get();

        return view(
            'categories.index',
            compact('categories')
        );
    }
    public function show($id)
    {
        $category = Category::findOrFail($id);

        $products = $category->products()->paginate(10);

        return view(
            'products.index',
            compact('products', 'category')
        );
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'カテゴリを更新しました');
    }
}
