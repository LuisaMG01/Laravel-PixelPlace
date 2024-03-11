<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function store(Request $request): View|RedirectResponse
    {
        $productsInSession = $request->session()->get('cart_product_data');

        if ($productsInSession) {
            $order = Order::create([
                'user_id' => 1,
                'total_coins' => 0,
            ]);
            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));

            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];

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

            $order->setTotalCoins($total);
            $order->save();

            $request->session()->forget('products');

            $viewData = [
                'title' => 'Cart - Test',
                'subtitle' => 'GamerZone',
                'order' => $order,
                'items' => $order->getItems(),
            ];

            return view('order.purchase')->with('viewData', $viewData);
        } else {
            return redirect()->route('cart.index');
        }
    }
}
