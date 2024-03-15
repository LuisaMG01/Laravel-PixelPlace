<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::all();
        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data');

        if ($cartProductData) {
            $cartProducts = Product::findMany(array_keys($cartProductData));
        }

        $viewData = [
            'products' => $products,
            'cartProducts' => $cartProducts,
        ];

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(int $id, Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data');
        $quantity = $request->input('quantity');
        Product::checkStock($id, $quantity, $cartProductData);
        $request->session()->put('cart_product_data', $cartProductData);

        return redirect()->route('cart.index');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_product_data');

        return redirect()->route('cart.index');
    }

    public function removeItem(Request $request, string $id): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data');
        unset($cartProductData[$id]);
        $request->session()->put('cart_product_data', $cartProductData);

        return back();
    }
}
