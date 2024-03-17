<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductsController extends Controller
{
    public function index(Request $request): view
    {
        $products = Product::query();
        $categories = Category::all();

        if ($request->filled('category')) {
            $products->where('category_id', $request->category);
        }

        if ($request->filled('price')) {
            $priceRange = explode('-', $request->price);
            $products->whereBetween('price', [$priceRange[0], $priceRange[1]]);
        }

        if ($request->filled('brand')) {
            $products->where('brand', 'like', '%' . $request->brand . '%');
        }

        if ($request->filled('name')) {
            $products->where('name', 'like', '%' . $request->name . '%');
        }

        $filteredProducts = $products->paginate(12);

        $viewData = [
            'products' => $filteredProducts,
            'categories' => $categories,
        ];

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $product = Product::findOrFail($id);
        $viewData = [
            'product' => $product,
            'category' => Category::findOrFail($product->category->getId()),
        ];

        return view('product.show')->with('viewData', $viewData);
    }
}
