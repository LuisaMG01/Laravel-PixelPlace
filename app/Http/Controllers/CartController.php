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
            'title' => 'Cart - Test',
            'subtitle' => 'GamerZone',
            'products' => $products,
            'cartProducts' => $cartProducts,
        ];

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(int $id, Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data');
        $cartProductData[$id] = $request->input('quantity');
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

    public function summary(Request $request): View|RedirectResponse
    {
        $productsInSession = $request->session()->get('cart_product_data');
        $productsSummary = [];

        if ($productsInSession) {
            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));

            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $subtotal = $product->getPrice() * $quantity;
                $total += $subtotal;
                $productsSummary[$product->getId()] = [$product, $subtotal, $quantity];
            }

            $viewData = [
                'title' => 'Cart - Summary',
                'subtitle' => 'GamerZone',
                'products' => $productsSummary,
                'total' => $total,
            ];

            return view('order.summary')->with('viewData', $viewData);
        } else {
            return redirect()->route('cart.index');
        }
    }
}
