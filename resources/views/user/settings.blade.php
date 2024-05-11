@extends('layouts.app')
@section('title', 'Settings')
@section('content')
    @if (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
        @include('partials.breadcrumb', ['viewData' => $viewData])
        <div class="mb-4 col-span-full xl:mb-2 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">{{ __('app.title_settings_index') }}
            </h1>
            <div class="btn-container">
                <a href="{{ route('orders.index') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('app.button_orders_settings_index') }}</a>
            </div>
        </div>
        <!-- Image -->
        <form action="{{ route('user.update', ['id' => Auth::user()->getId()]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-span-full xl:col-auto">
                <div
                    class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                        <img class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0"
                            src="{{ URL::asset('storage/' . Auth::user()->getName() . '.png') }}"
                            alt="{{ Auth::user()->getName() }} picture">
                        <div>
                            <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">
                                {{ __('app.profile_picture_settings_index') }}</h3>
                            <div class="mb-4 text-sm text-gray-500 dark:text-gray-400">
                                {{ __('app.format_image_settings_index') }}
                            </div>
                            <div class="flex items-center space-x-4">
                                <input type="file" name="image" id="image"
                                    class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                    placeholder="Type product name"
                                    value="{{ URL::asset('storage/' . Auth::user()->getName() . '.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <!--General Information -->
                <div class="col-span-2">
                    <div
                        class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <h3 class="mb-4 text-xl font-semibold dark:text-white">General information</h3>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('app.form_name_settings_index') }}
                                </label>
                                <input type="text" name="name" id="name"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Name" value= "{{ Auth::user()->getName() }}" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('app.form_email_settings_index') }}
                                </label>
                                <input type="email" name="email" id="email"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="example@company.com" value= "{{ Auth::user()->getEmail() }}" required>
                            </div>
                            <div class="col-span-6 sm:col-full">
                                <button
                                    class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                    type="submit">
                                    {{ __('app.form_button_settings_index') }}
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
