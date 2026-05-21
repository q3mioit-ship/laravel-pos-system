<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view(
            'categories.index',
            compact('categories')
        );
    }
    public function show($id)
    {
        $category = Category::findOrFail($id);

        $products = $category->products;

        return view(
            'products.index',
            compact('products', 'category')
        );
    }
}
