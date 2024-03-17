@extends('layouts.app')
@section('content')
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Order # {{ $viewData['order']->getId() }}</h5>
    <div class="bg-white rounded-lg shadow-md p-6 mb-4">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left font-semibold">Product</th>
                    <th class="text-left font-semibold">Adquire Price</th>
                    <th class="text-left font-semibold">Quantity</th>
                    <th class="text-left font-semibold">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['order']->items as $item)
                    <tr>
                        <td class="py-4 px-2">
                            <div class="flex items-center">
                                <span class="ml-8">{{ $item->product->getName() }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-2">$ {{ $item->getAcquirePriceCoins() }}</td>
                        <td class="py-4 px-2">{{ $item->getAmount() }}</td>
                        <td class="py-4 px-2">$ {{ $item->getAcquirePriceCoins()*$item->getAmount() }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="border-t border-gray-300 py-4 px-2"></td>
                </tr>
                <tr>
                    <td colspan="1" class="py-4 px-2 font-semibold">Total: </td>
                    <td></td>
                    <td></td>
                    <td class="py-4 px-2">$ {{ $viewData['order']->getTotalCoins() }}</td>
                </tr>
                <tr>
                    <td colspan="1" class="py-4 px-2 font-semibold">Date: </td>
                    <td></td>
                    <td></td>
                    <td class="py-4 px-2">{{ $viewData['order']->getCreatedAt() }}</td>
                </tr>
            </tbody>
        </table>
    </div>    
    <a href="{{ route('orders.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Go Back
    </a>
@endsection
