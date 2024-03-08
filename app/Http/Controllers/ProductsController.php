<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Util\JsonParser;

class ProductsController extends Controller
{
    public function index(): view
    {
        $viewData = [];
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('product.create');
    }

    public function store(Request $request): RedirectResponse
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
        Product::create($request->only(['name', 'image', 'brand', 'keywords', 'price', 'stock', 'description']));
        Session::flash('success', 'Elemento creado satisfactoriamente');

        return redirect()->route('product.index');
    }

    public function show(int $id): View
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['product'] = $product;

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
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['product'] = $product;
        return view('product.edit')->with('viewData', $viewData);
    }

    public function update(int $id, Request $request): RedirectResponse
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
    
        $product = Product::findOrFail($id);
        $keys = JsonParser::parseStrToJson($request->input('keywords'));
        $request->merge(['keywords' => $keys]);
        $product->update($request->all());

        return redirect()->route('product.index');
    }
}
