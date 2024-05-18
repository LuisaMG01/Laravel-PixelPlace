@extends('layouts.app')
@section('content')
    @include('partials.breadcrumb', ['viewData' => $viewData])
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="md:col-span-1 relative">
                <div class="max-w-sm mx-auto bg-white rounded-lg overflow-hidden shadow-md">
                    <div class="px-6 py-4">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{ __('app.filter_orders_order_index') }}</h2>
                        <button id="toggleFilterBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('app.filter_order_index') }}</button>
                        <div id="filterForm" class="hidden absolute bg-white rounded-lg border border-gray-300 shadow-md py-4 px-6 top-0 left-0 mt-12 z-10">
                            <form action="{{ route('user.orders') }}" method="GET">
                                <div class="mb-4">
                                    <label for="date_before" class="block text-gray-700 text-sm font-bold mb-2">{{ __('app.date_before_filter_order_index') }}:</label>
                                    <input type="date" name="date_before" id="date_before" class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                <div class="mb-4">
                                    <label for="date_after" class="block text-gray-700 text-sm font-bold mb-2">{{ __('app.date_after_filter_order_index') }}:</label>
                                    <input type="date" name="date_after" id="date_after" class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('app.filter_order_index') }}</button>
                                    <button type="button" id="closeFilterBtn" class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('app.close_order_index') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ __('app.table_order_order_index') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('app.table_total_order_index') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('app.table_date_order_index') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('app.table_action_order_index') }}
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
                            <a href="{{ route('user.order', ['id' => $order->getId()]) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('app.table_info_order_index') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Pagination -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
        @include('partials.pagination', ['paginator' => $viewData['orders']])
    </div>
@endsection
