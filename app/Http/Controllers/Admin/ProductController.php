<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\product\CreateRequest;
use App\Http\Requests\product\UpdateRequest;
use App\Utils\JsonParser;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::with('category')->paginate(5);
        $categories = Category::all();

        $viewData = [
            'products' => $products,
            'categories' => $categories,
        ];

        return view('admin.product', $viewData);
    }

    public function destroy(int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();

        Session::flash('success', 'Product deleted successfully.');

        return redirect()->route('admin.products.index');
    }

    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $keys = JsonParser::parseStrToJson($request->input('keywords'));
        $request->merge(['keywords' => $keys]);
        $product->update($request->all());

        Session::flash('success', 'Product updated successfully.');

        return redirect()->route('admin.products.index');
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $keys = JsonParser::parseStrToJson($request->input('keywords'));
        $request->merge(['keywords' => $keys]);
        Product::create($request->all());
        Session::flash('success', 'Product created successfully.');

        return redirect()->route('admin.products.index');
    }
}
