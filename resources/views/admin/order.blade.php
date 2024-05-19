@extends('layouts.admin')
@section('headerEntity', __('admin.title_admin_orders'))
@section('nameTable', __('admin.name_table_admin_orders'))
@section('content')
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <!--Table Header-->
        @include('partials.admin.adminTableHeader')
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        {{ __('admin.table_header_order_id_admin_orders') }}
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        {{ __('admin.table_header_user_admin_orders') }}
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        {{ __('admin.table_header_total_admin_orders') }}
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        {{ __('admin.table_header_date_admin_orders') }}
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        {{ __('admin.table_header_items_admin_orders') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['orders'] as $order)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="p-4 text-base font-semibold text-gray-900 dark:text-white">
                            {{ $order->getId() }}
                        </td>
                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $order->user->getName() }}
                        </td>
                        <td
                            class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                            {{ $order->getTotalCoins() }}
                        </td>
                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $order->getCreatedAt() }}
                        </td>
                        <td class="p-4 text-base font-semibold text-red-700 whitespace-nowrap dark:text-white">
                            <a
                                href="{{ route('admin.orders.show', ['id' => $order->getId()]) }}">{{ __('admin.more_details_message') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- Pagination -->
    <div class="flex justify-center">
        @include('partials.pagination', ['paginator' => $viewData['orders']])
    </div>
@endsection
