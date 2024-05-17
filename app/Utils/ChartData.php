<?php

namespace App\Utils;

use Carbon\Carbon;
use App\Models\Order;

class ChartData
{
    public static function getChartData(): array
    {
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

        return $chartData;
    }
}
