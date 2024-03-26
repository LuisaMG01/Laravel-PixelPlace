<?php

namespace App\Http\Controllers;

use App\Models\ChallengeUser;
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
            $userBalance = $user->getBalance();
            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));

            foreach ($productsInCart as $product) {
                $quantity = ($productsInSession[$product->getId()] > 0) ? $productsInSession[$product->getId()] : 1;
                $subtotal = $product->getPrice() * $quantity;
                $total += $subtotal;
                if ($product->getStock() < $quantity) {
                    return redirect()->route('cart.index')->with('stock_error', $product->getName());
                }
            }

            if ($userBalance < $total) {
                $request->session()->forget('cart_product_data');

                return redirect()->route('cart.index')->with('balance_error', $user->getName());
            }

            $order = Order::create([
                'user_id' => $userId,
                'total_coins' => 0,
            ]);

            foreach ($productsInCart as $product) {
                $quantity = ($productsInSession[$product->getId()] > 0) ? $productsInSession[$product->getId()] : 1;

                Item::create([
                    'amount' => $quantity,
                    'acquire_price_coins' => $product->getPrice(),
                    'product_id' => $product->getId(),
                    'order_id' => $order->getId(),
                ]);

                $newStock = $product->getStock() - $quantity;
                $product->setStock($newStock);
                $product->save();
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

            ChallengeUser::changeProgress($userId, $product->getId(), $quantity);

            return view('order.purchase')->with('viewData', $viewData);
        } else {
            return redirect()->route('cart.index');
        }
    }

    public function index(): View|RedirectResponse
    {
        if (Auth::check()) {
            $userId = Auth::user()->getId();
            $user = User::findOrFail($userId);
            $orders = $user->orders;

            $viewData = [
                'orders' => $orders,
            ];

            return view('order.index')->with('viewData', $viewData);
        } else {
            return redirect()->route('home')->with('error', 'You must login first');
        }
    }

    public function show(int $id): View
    {
        $order = Order::with('items')->findOrFail($id);

        $viewData = [
            'order' => $order,
        ];

        return view('order.show')->with('viewData', $viewData);
    }
}
