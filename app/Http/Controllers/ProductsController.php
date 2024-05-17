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
        $categories = Category::all();

        $filteredProducts = Product::filters($request);
        $filteredProducts = $filteredProducts->paginate(12);

        $breadCrumb = [__('app.products_breadcrumb')];

        $viewData = [
            'breadCrumb' => $breadCrumb,
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
