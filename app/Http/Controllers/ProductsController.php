<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\product\CreateRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Utils\JsonParser;
use App\Http\Requests\product\UpdateRequest;

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

        $filteredProducts = $products->get();
        
        $viewData = [
            'products' => $filteredProducts,
            'categories' => $categories,
        ];
        return view('product.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [
            'categories' => Category::all()
        ];

        return view('product.create')->with('viewData', $viewData);
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $keys = JsonParser::parseStrToJson($request->input('keywords'));
        $request->merge(['keywords' => $keys]);
        Product::create($request->only(['name', 'image', 'brand', 'keywords', 'price', 'stock', 'description','category_id']));
        Session::flash('success', __('app.success_creation_product'));

        return redirect()->route('product.index');
    }

    public function show(int $id): View
    {
        $product = Product::findOrFail($id);
        $viewData = [
            'product' => $product,
            'category' => Category::findOrFail($product->getCategoryId()),
        ];

        return view('product.show')->with('viewData', $viewData);
    }

    public function destroy(int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index');
    }

    public function edit(int $id): View
    {
        $product = Product::findOrFail($id);
        $viewData = [
            'product' => $product,
            'categories' => Category::all(),
        ];

        return view('product.edit')->with('viewData', $viewData);
    }

    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $keys = JsonParser::parseStrToJson($request->input('keywords'));
        $request->merge(['keywords' => $keys]);
        $product->update($request->all());

        return redirect()->route('product.index');
    }
}
