@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Available products</h1>
            <ul>
                @foreach ($viewData['products'] as $product)
                    <li>
                        Id: {{ $product->getId() }} -
                        Name: {{ $product->getName() }} -
                        Price: {{ $product->getPrice() }} -
                        <form method="POST" action="{{ route('cart.add', ['id' => $product->getId()]) }}">
                            @csrf
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <button type="submit">Add to cart</button>
                                </div>
                            </div>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
    <div class="flex flex-col md:flex-row gap-4 justify-content-center">
        <div>
            <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="text-left font-semibold">Product</th>
                            <th class="text-left font-semibold">Price</th>
                            <th class="text-left font-semibold">Quantity</th>
                            <th class="text-left font-semibold">Delete item</th>
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
                                <td class="py-4 px-2">{{ $product->getPrice() }}</td>
                                <td class="py-4 px-2">
                                    <div class="flex items-center">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="input-group">
                                                    <form method="POST" action="{{ route('cart.add', ['id' => $product->getId()]) }}">
                                                        @csrf
                                                        <select name="quantity" id="quantity_{{ $product->getId() }}" class="quantity-selector bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            @for ($i = 1; $i <= 10; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-2">
                                    <a href="{{ route('cart.removeItem', ['id' => $product->getId()]) }}">
                                        <h5 class="mb-2 text-x font-bold tracking-tight text-red-700 dark:text-white">Remove item</h5>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
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
                <form method="GET" action="{{ route('cart.summary') }}">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Continue</button>
                </form>
            </div>
        </div>
    </div>
@endsection
