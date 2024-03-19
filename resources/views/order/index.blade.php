@extends('layouts.app')
@section('content')


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('app.order_table_order') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('app.order_table_total') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('app.order_table_date') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('app.order_table_action') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viewData['orders'] as $order)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $order->getId() }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $order->getTotalCoins() }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $order->getCreatedAt() }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('orders.show', ['id' => $order->getId()]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('app.order_table_info') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
