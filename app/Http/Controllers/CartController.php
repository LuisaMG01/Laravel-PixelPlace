<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data');

        if ($cartProductData) {
            $cartProducts = [];

            if ($cartProductData) {
                $cartProducts = Product::findMany(array_keys($cartProductData));
            }

            $viewData = [
                'cartProducts' => $cartProducts,
            ];

            return view('cart.index')->with('viewData', $viewData);
        } else {
            return redirect()->route('cart.index')->with('empty_cart', ' ');
        }
    }

    public function add(int $id, Request $request): RedirectResponse
    {
        if (Auth::check()) {
            $cartProductData = $request->session()->get('cart_product_data');
            $cartProductData[$id] = $request->input('quantity');
            $request->session()->put('cart_product_data', $cartProductData);
            $product = Product::findOrFail($id);
            Session::flash('success', $product->getName());

            return back();
        } else {
            return redirect('register');
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_product_data');

        return redirect()->route('cart.index');
    }

    public function removeItem(Request $request, int $id): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data');
        unset($cartProductData[$id]);
        $request->session()->put('cart_product_data', $cartProductData);

        return redirect()->route('cart.index');
    }
}
