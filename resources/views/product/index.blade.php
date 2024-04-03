@extends('layouts.app')
@section('content')
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ __('app.success_product_index') }}</strong>
            <span class="block sm:inline">{{ session('success') }} {{ __('app.added_succesfully_product_index') }}</span>
        </div>
    @endif
    @if (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ __('app.success_product_review') }}</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif
    @if (session('updated'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ __('app.success_review_edit') }}</strong>
            <span class="block sm:inline">{{ session('updated') }}</span>
        </div>
    @endif
    <br>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="md:col-span-1 relative">
                <div class="max-w-sm mx-auto bg-white rounded-lg overflow-hidden shadow-md">
                    <div class="px-6 py-4">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{ __('app.filter_products_product_index') }}
                        </h2>
                        <button id="toggleFilterBtn"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('app.filter_product_index') }}</button>
                        <div id="filterForm"
                            class="hidden absolute bg-white rounded-lg border border-gray-300 shadow-md py-4 px-6 top-0 left-0 mt-12 z-10">
                            <form action="{{ route('products.index') }}" method="GET">
                                <div class="mb-4">
                                    <label for="category"
                                        class="block text-gray-700 text-sm font-bold mb-2">{{ __('app.category_product_index') }}:</label>
                                    <select name="category" id="category"
                                        class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                                        <option value="">{{ __('app.all_categories_product_index') }}</option>
                                        @foreach ($viewData['categories'] as $category)
                                            <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="price"
                                        class="block text-gray-700 text-sm font-bold mb-2">{{ __('app.price_product_index') }}:</label>
                                    <select name="price" id="price"
                                        class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                                        <option value="">{{ __('app.select_price_range_product_index') }}</option>
                                        <option value="0-49">{{ __('app.less_than_50_product_index') }}</option>
                                        @for ($i = 50; $i <= 300; $i += 50)
                                            <option value="{{ $i }}-{{ $i + 49 }}">{{ $i . '$' }} -
                                                {{ $i + 49 . '$' }}</option>
                                        @endfor
                                        <option value="301">{{ __('app.more_than_300_product_index') }}</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="brand"
                                        class="block text-gray-700 text-sm font-bold mb-2">{{ __('app.brand_product_index') }}:</label>
                                    <input type="text" name="brand" id="brand"
                                        class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300"
                                        placeholder="{{ __('app.example_sony_product_index') }}">
                                </div>
                                <div class="mb-4">
                                    <label for="name"
                                        class="block text-gray-700 text-sm font-bold mb-2">{{ __('app.name_product_index') }}:</label>
                                    <input type="text" name="name" id="name"
                                        class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300"
                                        placeholder="{{ __('app.example_play_5_product_index') }}">
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('app.filter_product_index') }}</button>
                                    <button type="button" id="closeFilterBtn"
                                        class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('app.close_product_index') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($viewData['products'] as $product)
                    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="{{ route('products.show', ['id' => $product->getId()]) }}">
                            <img class="p-8 rounded-t-lg" src="{{ URL::asset('storage/' . $product->getName() . '.png') }}"
                                alt="product image">
                        </a>
                        <div class="px-5 pb-5">
                            <a href="{{ route('products.show', ['id' => $product->getId()]) }}">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    {{ $product->getName() }}</h5>
                            </a>
                            <div class="flex items-center mt-2.5 mb-5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $product->getRating())
                                            <svg class="w-4 h-4 text-yellow-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 text-gray-300" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                        @endif
                                    @endfor
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{ $product->getRating() }}</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span
                                    class="text-3xl font-bold text-gray-900 dark:text-white">${{ $product->getPrice() }}</span>
                                <form method="POST" action="{{ route('cart.add', ['id' => $product->getId()]) }}">
                                    @csrf
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('app.add_to_cart_product_index') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Pagination -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            @include('partials.pagination', ['paginator' => $viewData['products']])
        </div>
    @endsection
