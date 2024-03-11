@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <h1 class="text-2xl font-semibold mb-4">Order summary</h1>
    <div class="flex flex-col md:flex-row gap-4 justify-content-center">
        <div>
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
                                <td class="py-4 px-2">{{ $value[0]->getPrice() }}</td>
                                <td class="py-4 px-2">{{ $value[2] }}</td>
                                <td class="py-4 px-2">{{ $value[1] }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="py-4 px-2 text-right font-semibold">Total</td>
                            <td class="py-4 px-2">{{ $viewData['total'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold mb-4">Actions</h2>
                <form method="POST" action="{{ route('cart.destroy') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Delete Cart</button>
                </form>
                <form method="POST" action="{{ route('order.create') }}">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Confirm Order</button>
                </form>
            </div>
        </div>
    </div>
@endsection
