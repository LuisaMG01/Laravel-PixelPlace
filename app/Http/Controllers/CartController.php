<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $products = []; //this simulates the database
        $products[121] = ['name' => 'Tv samsung', 'price' => '1000'];
        $products[11] = ['name' => 'Iphone', 'price' => '2000'];
        $products[111] = ['name' => 'Tv LG', 'price' => '5000'];
        $products[1] = ['name' => 'Lenovo', 'price' => '500'];

        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data');
        if ($cartProductData) {
            foreach ($products as $key => $product) {
                if (in_array($key, array_keys($cartProductData))) {
                    $cartProducts[$key] = $product;
                }
            }
        }

        $viewData = [];
        $viewData['title'] = 'Cart - Test';
        $viewData['subtitle'] = 'GamerZone';
        $viewData['products'] = $products;
        $viewData['cartProducts'] = $cartProducts;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(string $id, Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data');
        $cartProductData[$id] = $id;
        $request->session()->put('cart_product_data', $cartProductData);

        return back();
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_product_data');

        return back();
    }

    public function removeItem(Request $request, string $id): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data');
        unset($cartProductData[$id]);
        $request->session()->put('cart_product_data', $cartProductData);

        return back();
    }
}
