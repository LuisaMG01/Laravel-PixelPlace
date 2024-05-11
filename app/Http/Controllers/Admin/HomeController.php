<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index(): View
    {
        $productCount = Product::count();
        $orderCount = Order::count();
        $userCount = User::count();

        $startDate = Carbon::now()->subDays(5);
        $endDate = Carbon::now();

        $orders = Order::query()
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupByRaw('DATE(created_at)')
            ->get()
            ->keyBy('date');

        $chartData = [
            'categories' => [],
            'series' => [],
        ];

        while ($startDate <= $endDate) {
            $date = $startDate->format('d F');
            $chartData['categories'][] = $date;

            $order = $orders->get($startDate->format('Y-m-d'), (object) ['total' => 0]);
            $chartData['series'][] = $order->total;

            $startDate->addDay();
        }

        $viewData = [
            'productCount' => $productCount,
            'orderCount' => $orderCount,
            'userCount' => $userCount,
            'chartData' => $chartData,
        ];


        return view('admin.index')->with('viewData', $viewData);
    }
}
