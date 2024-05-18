@extends('layouts.admin')
@section('headerEntity', __('admin.title_admin_products'))
@section('nameTable', __('admin.name_table_admin_products'))
@section('buttonEntity', __('admin.button_entity_admin_products'))
@section('content')
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ __('admin.success_message_admin_products') }}</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <div
        class='p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700'>
        <!--Table Header-->
        @include('partials.admin.adminTableHeader')
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <!--Columns -->
                <tr>
                    <th scope='col' class='p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400'>
                        {{ __('admin.table_header_product_name_admin_products') }}
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        {{ __('admin.table_header_brand_admin_products') }}
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        {{ __('admin.table_header_keywords_admin_products') }}
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        {{ __('admin.table_header_stock_admin_products') }}
                    </th>
                    <th scope='col' class='p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400'>
                        {{ __('admin.table_header_price_admin_products') }}
                    </th>
                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        {{ __('admin.table_header_description_admin_products') }}
                    </th>
                    <th scope='col' class='p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400'>
                        {{ __('admin.table_header_actions_admin_products') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['products'] as $product)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
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
                                aria-controls="drawer-update-product-{{ $product->getId() }}" data-drawer-placement="right"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ __('admin.button_update_admin_products') }}
                            </button>

                            <button type="button" id="deleteProductButton"
                                data-drawer-target="drawer-delete-product-{{ $product->getId() }}"
                                data-drawer-show="drawer-delete-product-{{ $product->getId() }}"
                                aria-controls="drawer-delete-product-{{ $product->getId() }}" data-drawer-placement="right"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ __('admin.button_delete_admin_products') }}
                            </button>
                        </td>
                    </tr>

                    <!-- Edit Product Drawer -->
                    <div id="drawer-update-product-{{ $product->getId() }}"
                        class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
                        tabindex="-1" aria-labelledby="drawer-label-{{ $product->getId() }}" aria-hidden="true">
                        <h5 id="drawer-label-{{ $product->getId() }}"
                            class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                            {{ __('admin.drawer_title_update_admin_products') }}</h5>
                        <button type="button" data-drawer-dismiss="drawer-update-product-{{ $product->getId() }}"
                            aria-controls="drawer-update-product-{{ $product->getId() }}"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">{{ __('admin.close_menu_message') }}</span>
                        </button>
                        <form action="{{ route('admin.products.update', ['id' => $product->getId()]) }}"
                            id="update-form-{{ $product->getId() }}" method='POST' enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="space-y-4">
                                <div>
                                    <label for="name-{{ $product->getId() }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.form_name_label') }}</label>
                                    <input type="text" name="name" id="name-{{ $product->getId() }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="{{ $product->getName() }}"
                                        placeholder="{{ __('admin.name_placeholder_admin_product') }}" required="">
                                </div>
                                <div>
                                    <label for="category_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_category_admin_products') }}</label>
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
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_price_admin_products') }}</label>
                                    <input type="text" name="price" id="price-{{ $product->getId() }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="{{ $product->getPrice() }}"
                                        placeholder="{{ __('admin.price_placeholder_admin_product') }}" required="">
                                </div>
                                <div>
                                    <label for="description-{{ $product->getId() }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_description_admin_products') }}</label>
                                    <input type="text" name="description" id="description-{{ $product->getId() }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="{{ $product->getDescription() }}"
                                        placeholder="{{ __('admin.description_placeholder_admin_product') }}"
                                        required="">
                                </div>
                                <div>
                                    <label for="stock-{{ $product->getId() }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_stock_admin_products') }}</label>
                                    <input type="text" name="stock" id="stock-{{ $product->getId() }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="{{ $product->getStock() }}"
                                        placeholder="{{ __('admin.stock_placeholder_admin_product') }}" required="">
                                </div>
                                <div>
                                    <label for="brand-{{ $product->getId() }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_brand_admin_products') }}</label>
                                    <input type="text" name="brand" id="brand-{{ $product->getId() }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="{{ $product->getBrand() }}"
                                        placeholder="{{ __('admin.brand_placeholder_admin_product') }}" required="">
                                </div>
                                <div>
                                    <label for="keywords-{{ $product->getId() }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_keywords_admin_products') }}</label>
                                    <input type="text" name="keywords" id="keywords-{{ $product->getId() }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="{{ implode(', ', $product->getKeywords()) }}"
                                        placeholder="{{ __('admin.keywords_placeholder_admin_product') }}"
                                        required="">
                                </div>
                                <div>
                                    <label for="image-{{ $product->getId() }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_image_admin_products') }}</label>
                                    <input type="file" name="image" id="image"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="{{ asset('storage/' . $product->getImage()) }}">
                                </div>
                            </div>
                            <div class="flex justify-center mt-10">
                                <button type="submit" id="updateProductButton"
                                    data-drawer-target="drawer-update-product-default"
                                    data-drawer-show="drawer-update-product-default"
                                    aria-controls="drawer-update-product-default" data-drawer-placement="right"
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
                                    {{ __('admin.button_update_admin_products') }}
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
                            {{ __('admin.drawer_title_delete_admin_products') }}
                        </h5>
                        <button type="button" data-drawer-dismiss="drawer-delete-product-{{ $product->getId() }}""
                            aria-controls="drawer-delete-product-{{ $product->getId() }}""
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">{{ __('admin.close_menu_message') }}</span>
                        </button>
                        <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">
                            {{ __('admin.delete_confirmation_admin_products') }}</h3>
                        <form id="delete-form-{{ $product->getId() }}"
                            action="{{ route('admin.products.destroy', ['id' => $product->getId()]) }}" method='POST'>
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900">
                                {{ __('admin.delete_confirm_button_admin_products') }}
                            </button>
                        </form>
                        <a href="#"
                            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                            data-drawer-hide="drawer-delete-product-default">
                            {{ __('admin.delete_cancel_button_admin_products') }}
                        </a>
                    </div>
                @endforeach
            </tbody>
        </table>

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
            class='inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400'>
            {{ __('admin.drawer_title_add_new_product_admin_products') }}</h5>
        <button type='button' data-drawer-dismiss='drawer-create-product-default'
            aria-controls='drawer-create-product-default'
            class='text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white'>
            <svg aria-hidden='true' class='w-5 h-5' fill='currentColor' viewBox='0 0 20 20'
                xmlns='http://www.w3.org/2000/svg'>
                <path fill-rule='evenodd'
                    d='M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z'
                    clip-rule='evenodd'></path>
            </svg>
            <span class='sr-only'>{{ __('admin.close_menu_message') }}</span>
        </button>
        <form action="{{ route('admin.products.store') }}" method='POST' enctype="multipart/form-data">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_name_admin_products') }}</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="{{ __('admin.name_placeholder_admin_product') }}" required="">
                </div>
                <div>
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_description_admin_products') }}</label>
                    <input type="text" name="description" id="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="{{ __('admin.description_placeholder_admin_product') }}" required="">
                </div>
                <div>
                    <label for="brand"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_brand_admin_products') }}</label>
                    <input type="text" name="brand" id="brand"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="{{ __('admin.brand_placeholder_admin_product') }}" required="">
                </div>
                <div>
                    <label for="price"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_price_admin_products') }}</label>
                    <input type="numeric" name="price" id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="{{ __('admin.price_placeholder_admin_product') }}" required="">
                </div>
                <div>
                    <label for="stock"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_stock_admin_products') }}</label>
                    <input type="numeric" name="stock" id="stock"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="{{ __('admin.stock_placeholder_admin_product') }}" required="">
                </div>
                <div>
                    <label for="keywords"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_keywords_admin_products') }}</label>
                    <input type="text" name="keywords" id="keywords"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="{{ __('admin.keywords_placeholder_admin_product') }}" required="">
                </div>
                <div>
                    <label for="image"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_image_admin_products') }}</label>
                    <input type="file" name="image" id="image"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
                <div>
                    <label for="storage_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_storage_admin_products') }}</label>
                    <select name="storage" id="storage_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="local">{{ __('admin.input_label_storage_local_admin_products') }}</option>
                        <option value="gcp">{{ __('admin.input_label_storage_gcp_admin_products') }}</option>
                    </select>
                </div>
                <div>
                    <label for="category_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_category_admin_products') }}</label>
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
                        {{ __('admin.button_add_new_product_admin_products') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
