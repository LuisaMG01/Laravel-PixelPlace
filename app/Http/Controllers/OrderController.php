<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function preorder(Request $request): View|RedirectResponse
    {
        $productsInSession = $request->session()->get('cart_product_data');
        $productsSummary = [];

        if ($productsInSession) {
            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));

            foreach ($productsInCart as $product) {
                $quantity = ($productsInSession[$product->getId()] > 0) ? $productsInSession[$product->getId()] : 1;
                $subtotal = $product->getPrice() * $quantity;
                $total += $subtotal;
                $productsSummary[$product->getId()] = [$product, $subtotal, $quantity];
            }

            $viewData = [
                'products' => $productsSummary,
                'total' => $total,
            ];

            return view('order.preorder')->with('viewData', $viewData);
        } else {
            return redirect()->route('cart.index');
        }
    }

    public function store(Request $request): View|RedirectResponse
    {
        $productsInSession = $request->session()->get('cart_product_data');

        if ($productsInSession) {
            $userId = Auth::user()->getId();
            $user = User::findOrFail($userId);
            $order = Order::create([
                'user_id' => $userId,
                'total_coins' => 0,
            ]);

            $userBalance = $user->getBalance();
            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));

            foreach ($productsInCart as $product) {
                $quantity = ($productsInSession[$product->getId()] > 0) ? $productsInSession[$product->getId()] : 1;

                $item = Item::create([
                    'amount' => $quantity,
                    'acquire_price_coins' => $product->getPrice(),
                    'product_id' => $product->getId(),
                    'order_id' => $order->getId(),
                ]);

                $newStock = $product->getStock() - $quantity;
                $product->setStock($newStock);
                $product->save();
                $total += $product->getPrice() * $quantity;
            }

            $user->setBalance($userBalance - $total);
            $user->save();
            $order->setTotalCoins($total);
            $order->save();

            $request->session()->forget('cart_product_data');

            $viewData = [
                'order' => $order,
                'items' => $order->getItems(),
            ];

            return view('order.purchase')->with('viewData', $viewData);
        } else {
            return redirect()->route('cart.index');
        }
    }
}
