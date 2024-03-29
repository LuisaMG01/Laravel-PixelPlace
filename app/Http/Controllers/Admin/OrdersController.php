<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\View\View;

class OrdersController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('user')->paginate(5);
        $users = User::all();

        $viewData = [
            'orders' => $orders,
            'users' => $users,
        ];

        return view('admin.order')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $order = Order::with('items')->findOrFail($id);

        $viewData = [
            'order' => $order,
        ];

        return view('admin.showOrder')->with('viewData', $viewData);
    }
}
