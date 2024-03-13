<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::all();
        $viewData = [
            'orders' => $orders,
        ];

        return view('admin.adminOrder')->with('viewData', $viewData);
    }
}
