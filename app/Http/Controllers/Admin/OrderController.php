<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('user')->paginate(5);
        $users = User::all();

        $viewData = [
            'orders' => $orders,
            'users' => $users,
        ];

        return view('admin.order', $viewData);
    }
}
