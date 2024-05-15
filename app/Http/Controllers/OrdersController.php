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

class OrdersController extends Controller
{
    public function preorder(Request $request): View|RedirectResponse
    {
        $productsInSession = $request->session()->get('cart_product_data');

        if ($productsInSession) {
            $productsData = Order::calculateTotalAndSummary($productsInSession);

            $viewData = [
                'products' => $productsData['productsSummary'],
                'total' => $productsData['total'],
            ];

            return view('order.preorder')->with('viewData', $viewData);
        } else {
            return redirect()->route('cart.index')->with('empty_cart', ' ');
        }
    }

    public function store(Request $request): View|RedirectResponse
    {
        $productsInSession = $request->session()->get('cart_product_data');

        if ($productsInSession) {
            $userId = Auth::user()->getId();
            $user = User::findOrFail($userId);
            $userBalance = $user->getBalance();
            $calculationResult = Order::calculateTotalAndSummary($productsInSession);
            $total = $calculationResult['total'];
            $productsSummary = $calculationResult['productsSummary'];
            $productsInCart = Product::findMany(array_keys($productsInSession));

            foreach ($productsSummary as $productId => $productData) {
                $product = $productData[0];
                $quantity = $productData[2];
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

                $item = Item::create([
                    'amount' => $quantity,
                    'acquire_price_coins' => $product->getPrice(),
                    'product_id' => $product->getId(),
                    'order_id' => $order->getId(),
                ]);

                $newStock = $product->getStock() - $quantity;
                $product->setStock($newStock);
                $product->save();

                ChallengeUser::changeProgress($userId, $product->getId(), $quantity);
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