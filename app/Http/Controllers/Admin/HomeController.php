<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;
use App\Utils\ChartData;

class HomeController extends Controller
{
    public function index(): View
    {
        $productCount = Product::count();
        $orderCount = Order::count();
        $userCount = User::count();

        $chartData = ChartData::getChartData();

        $viewData = [
            'productCount' => $productCount,
            'orderCount' => $orderCount,
            'userCount' => $userCount,
            'chartData' => $chartData,
        ];

        return view('admin.index')->with('viewData', $viewData);
    }
}
