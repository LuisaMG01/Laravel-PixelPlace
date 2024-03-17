@extends('layouts.admin')
@section('headerEntity', 'Products')
@section('nameTable', 'Products')
@section('buttonEntity', 'product')
@section('content')
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <div
        class='p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700'>
        <!--Table Header-->
        @include('partials.admin.adminTableHeader')
    </div>
    <div class='flex flex-col'>
        <div class='overflow-x-auto'>
            <div class='inline-block min-w-full align-middle'>
                <div class='overflow-hidden shadow'>
                    <table class='min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600'>
                        <thead class='bg-gray-100 dark:bg-gray-700'>
                            <!--Columns -->
                            <tr>
                                <th scope='col'
                                    class='p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400'>
                                    Product Name
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Brand
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Keywords
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Stock
                                </th>
                                <th scope='col'
                                    class='p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400'>
                                    Price
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Description
                                </th>
                                <th scope='col'
                                    class='p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400'>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($viewData['products'] as $product)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <!-- Object Values -->
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        <div class="text-base font-semibold text-gray-900 dark:text-white">
                                            {{ $product->getName() }}</div>
                                        <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                            {{ $product->category->getName() }}</div>
                                    </td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->getBrand() }}</td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ implode(', ', $product->getKeywords()) }} </td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->getStock() }}
                                    </td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        $ {{ $product->getPrice() }}
                                    </td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->getDescription() }}
                                    </td>

                                    <!-- Actions -->
                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <button type="button" id="updateProductButton"
                                            data-drawer-target="drawer-update-product-{{ $product->getId() }}"
                                            data-drawer-show="drawer-update-product-{{ $product->getId() }}"
                                            aria-controls="drawer-update-product-{{ $product->getId() }}"
                                            data-drawer-placement="right"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Update
                                        </button>

                                        <button type="button" id="deleteProductButton"
                                            data-drawer-target="drawer-delete-product-{{ $product->getId() }}"
                                            data-drawer-show="drawer-delete-product-{{ $product->getId() }}"
                                            aria-controls="drawer-delete-product-{{ $product->getId() }}"
                                            data-drawer-placement="right"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Delete
                                        </button>
                                    </td>
                                </tr>

                                <!-- Edit Product Drawer -->
                                <div id="drawer-update-product-{{ $product->getId() }}"
                                    class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
                                    tabindex="-1" aria-labelledby="drawer-label-{{ $product->getId() }}"
                                    aria-hidden="true">
                                    <h5 id="drawer-label-{{ $product->getId() }}"
                                        class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                                        Update
                                        Product</h5>
                                    <button type="button"
                                        data-drawer-dismiss="drawer-update-product-{{ $product->getId() }}"
                                        aria-controls="drawer-update-product-{{ $product->getId() }}"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close menu</span>
                                    </button>
                                    <form action="{{ route('admin.products.update', ['id' => $product->getId()]) }}"
                                        id="update-form-{{ $product->getId() }}" method='POST' enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="space-y-4">
                                            <div>
                                                <label for="name-{{ $product->getId() }}"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                <input type="text" name="name" id="name-{{ $product->getId() }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    value="{{ $product->getName() }}" placeholder="Type product name"
                                                    required="">
                                            </div>
                                            <div>
                                                <label for="category_id"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                <select name="category_id" id="category_id"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    @foreach ($viewData['categories'] as $category)
                                                        <option value="{{ $category->getId() }}"
                                                            {{ $category->getId() == $product->category->getId() ? 'selected' : '' }}>
                                                            {{ $category->getName() }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label for="price-{{ $product->getId() }}"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                                <input type="text" name="price" id="price-{{ $product->getId() }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    value="{{ $product->getPrice() }}" placeholder="Price product "
                                                    required="">
                                            </div>
                                            <div>
                                                <label for="description-{{ $product->getId() }}"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                <input type="text" name="description"
                                                    id="description-{{ $product->getId() }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    value="{{ $product->getDescription() }}"
                                                    placeholder="Type product name" required="">
                                            </div>
                                            <div>
                                                <label for="stock-{{ $product->getId() }}"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                                                <input type="text" name="stock" id="stock-{{ $product->getId() }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    value="{{ $product->getStock() }}" placeholder="Type product name"
                                                    required="">
                                            </div>
                                            <div>
                                                <label for="brand-{{ $product->getId() }}"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                                                <input type="text" name="brand" id="brand-{{ $product->getId() }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    value="{{ $product->getBrand() }}" placeholder="Type product name"
                                                    required="">
                                            </div>
                                            <div>
                                                <label for="keywords-{{ $product->getId() }}"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keywords</label>
                                                <input type="text" name="keywords"
                                                    id="keywords-{{ $product->getId() }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    value="{{ implode(', ', $product->getKeywords()) }}"
                                                    placeholder="Type product name" required="">
                                            </div>
                                            <div>
                                                <label for="image-{{ $product->getId() }}"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                                <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Type product name" value="{{ asset('storage/' . $product->getImage()) }}">
                                            </div>
                                        </div>
                                        <div class="flex justify-center mt-10">
                                            <button type="submit" id="updateProductButton"
                                                data-drawer-target="drawer-update-product-default"
                                                data-drawer-show="drawer-update-product-default"
                                                aria-controls="drawer-update-product-default"
                                                data-drawer-placement="right"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- Delete Product Drawer -->
                                <div id="drawer-delete-product-{{ $product->getId() }}""
                                    class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
                                    tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                                    <h5 id="drawer-label"
                                        class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                                        Delete item
                                    </h5>
                                    <button type="button"
                                        data-drawer-dismiss="drawer-delete-product-{{ $product->getId() }}""
                                        aria-controls="drawer-delete-product-{{ $product->getId() }}""
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close menu</span>
                                    </button>
                                    <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">Are you sure you want to
                                        delete this product?</h3>
                                    <form id="delete-form-{{ $product->getId() }}"
                                        action="{{ route('admin.products.destroy', ['id' => $product->getId()]) }}"
                                        method='POST'>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900">
                                            Yes, I'm sure
                                        </button>
                                    </form>
                                    <a href="#"
                                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                                        data-drawer-hide="drawer-delete-product-default">
                                        No, cancel
                                    </a>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="flex justify-center">
            @include('partials.pagination', ['paginator' => $viewData['products']])
        </div>
    </div>




    <!-- Add Product Drawer -->
    <div id='drawer-create-product-default'
        class='fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800'
        tabindex='-1' aria-labelledby='drawer-label' aria-hidden='true'>
        <h5 id='drawer-label'
            class='inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400'>New
            Product</h5>
        <button type='button' data-drawer-dismiss='drawer-create-product-default'
            aria-controls='drawer-create-product-default'
            class='text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white'>
            <svg aria-hidden='true' class='w-5 h-5' fill='currentColor' viewBox='0 0 20 20'
                xmlns='http://www.w3.org/2000/svg'>
                <path fill-rule='evenodd'
                    d='M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z'
                    clip-rule='evenodd'></path>
            </svg>
            <span class='sr-only'>Close menu</span>
        </button>
        <form action="{{ route('admin.products.store') }}" method='POST' enctype="multipart/form-data">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type product name" required="">
                </div>
                <div>
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <input type="text" name="description" id="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type product name" required="">
                </div>
                <div>
                    <label for="brand"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                    <input type="text" name="brand" id="brand"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type product name" required="">
                </div>
                <div>
                    <label for="price"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="numeric" name="price" id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type product name" required="">
                </div>
                <div>
                    <label for="stock"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                    <input type="numeric" name="stock" id="stock"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type product name" required="">
                </div>
                <div>
                    <label for="keywords"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keywords</label>
                    <input type="text" name="keywords" id="keywords"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type product name" required="">
                </div>
                <div>
                    <label for="image"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                    <input type="file" name="image" id="image"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type product name" required="">
                </div>
                <div>
                    <label for="category_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select name="category_id" id="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @foreach ($viewData['categories'] as $category)
                            <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-center mt-10">
                    <button id="createProductButton"
                        class="text-black bg-white hover:bg-gray-200 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 border border-gray-300 focus:outline-none"
                        type="submit" data-drawer-target="drawer-create-product-default"
                        data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default"
                        data-drawer-placement="right">
                        Add new product
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
