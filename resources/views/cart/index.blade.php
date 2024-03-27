@extends('layouts.app')
@section('content')
    @if (session('balance_error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ __('app.error_cart_index') }}</strong>
            <span class="block sm:inline">{{ __('app.balance_error_cart_index') }}</span>
        </div>
    @endif
    @if (session('empty_cart'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ __('app.error_cart_index') }}</strong>
            <span class="block sm:inline">{{ __('app.balance_error_cart_index') }}</span>
        </div>
    @endif
    @if (session('stock_error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ __('app.error_cart_index') }}</strong>
            <span class="block sm:inline">{{ session('stock_error') }} {{ __('app.stock_error_cart_index') }}</span>
        </div>
    @endif
    <div class="flex justify-center">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-3">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                    {{ __('app.shopping_cart') }}</h5>
                <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold">{{ __('app.name_cart_index') }}</th>
                                <th class="text-left font-semibold">{{ __('app.price_cart_index') }}</th>
                                <th class="text-left font-semibold">{{ __('app.quantity_cart_index') }}</th>
                                <th class="text-left font-semibold">{{ __('app.delete_cart_index') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData['cartProducts'] as $product)
                                <tr>
                                    <td class="py-4 px-2">
                                        <div class="flex items-center">
                                            <span class="font-semibold ml-8">{{ $product->getName() }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-2">$ {{ $product->getPrice() }}</td>
                                    <td class="py-4 px-2">
                                        <div class="flex items-center">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="input-group">
                                                        <form method="POST"
                                                            action="{{ route('cart.add', ['id' => $product->getId()]) }}">
                                                            @csrf
                                                            <select name="quantity" id="quantity_{{ $product->getId() }}"
                                                                class="quantity-selector bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                required>
                                                                @php
                                                                    $maxQuantity = min(10, $product->getStock());
                                                                @endphp
                                                                @for ($i = 1; $i <= $maxQuantity; $i++)
                                                                    <option value="{{ $i }}">
                                                                        {{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-2">
                                        <a class="delete-button" href="{{ route('cart.removeItem', ['id' => $product->getId()]) }}">
                                            <h5 class="mb-2 text-x font-bold tracking-tight text-red-700 dark:text-white">{{ __('app.remove_cart_index') }}</h5>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">{{ __('app.actions_cart_index') }}</h2>
                    <form method="POST" action="{{ route('cart.destroy') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button bg-red-500 font-semibold text-white py-2 px-4 rounded-lg mt-4 w-full">{{ __('app.delete_button_cart_index') }}</button>
                    </form>
                    <form method="GET" action="{{ route('orders.preorder') }}">
                        @csrf
                        <button type="submit" class="bg-blue-500 font-semibold text-white py-2 px-4 rounded-lg mt-4 w-full">{{ __('app.continue_button_cart_index') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
