<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateRequest;
use App\Models\Product;
use App\Util\JsonParser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ProductsController extends Controller
{
    public function index(): view
    {
        $viewData = [
            'products' => Product::all(),
        ];

        return view('product.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('product.create');
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $keys = JsonParser::parseStrToJson($request->input('keywords'));
        $request->merge(['keywords' => $keys]);
        Product::create($request->only(['name', 'image', 'brand', 'keywords', 'price', 'stock', 'description']));
        Session::flash('success', __('app.success_message_store'));

        return redirect()->route('product.index');
    }

    public function show(int $id): View
    {
        $product = Product::findOrFail($id);
        $viewData = [
            'product' => $product,
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
        ];

        return view('product.edit')->with('viewData', $viewData);
    }

    public function update(Product $product, Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'brand' => 'required',
            'keywords' => 'required',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:0',
            'description' => 'required',
        ]);

        $keys = JsonParser::parseStrToJson($request->input('keywords'));
        $request->merge(['keywords' => $keys]);
        $product->update($request->all());

        return redirect()->route('product.index');
    }
}
