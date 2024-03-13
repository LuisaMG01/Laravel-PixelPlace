@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-3">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Preorder</h5>
                <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold">Product</th>
                                <th class="text-left font-semibold">Price</th>
                                <th class="text-left font-semibold">Quantity</th>
                                <th class="text-left font-semibold">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData['products'] as $product => $value)
                                <tr>
                                    <td class="py-4 px-2">
                                        <div class="flex items-center">
                                            <span class="font-semibold ml-8">{{ $value[0]->getName() }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-2">$ {{ $value[0]->getPrice() }}</td>
                                    <td class="py-4 px-2">{{ $value[2] }}</td>
                                    <td class="py-4 px-2">$ {{ $value[1] }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="border-t border-gray-300 py-4 px-2"></td>
                            </tr>
                            <tr>
                                <td colspan="1" class="py-4 px-2 font-semibold">Total: </td>
                                <td></td>
                                <td></td>
                                <td class="py-4 px-2">$ {{ $viewData['total'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">Actions</h2>
                    <form method="GET" action="{{ route('cart.index') }}">
                        @csrf
                        <button type="submit" class="bg-blue-500 font-semibold text-white py-2 px-4 rounded-lg mt-4 w-full">Go Back</button>
                    </form>
                    <form method="POST" action="{{ route('order.create') }}">
                        @csrf
                        <button type="submit" class="delete-button bg-green-500 font-semibold text-white py-2 px-4 rounded-lg mt-4 w-full">Confirm Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection