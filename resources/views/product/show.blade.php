@extends('layouts.app')
@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                <h1
                    class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    {{ $viewData['product']->getName() }}</h1>
                <h5 class="text-xl font-bold dark:text-white">{{ $viewData['product']->getBrand() }}</h5>
                <p class="leading-relaxed">
                    @foreach ($viewData['product']->getKeywords() as $keyword)
                        {{ $keyword }}.
                    @endforeach
                </p>
                <p class="mb-4">{{ $viewData['product']->getDescription() }}</p>
                <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                    <span
                        class="title-font font-medium text-2xl text-gray-900">${{ $viewData['product']->getPrice() }}</span>
                </div>
                <!--Buttons -->
                <div class="flex">
                    @auth
                        <div class="btn-container mr-8">
                            <a href="{{ route('reviews.create', ['id' => $viewData['product']->getId()]) }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('app.comment_product_show') }}</a>
                        </div>
                    @endauth
                    <div class="btn-container mr-8">
                        <a href="{{ route('reviews.show', ['id' => $viewData['product']->getId()]) }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-4">{{ __('app.see_comments_product_show') }}</a>
                    </div>
                    <div class="btn-container inline-flex">
                        <form method="POST" action="{{ route('cart.add', ['id' => $viewData['product']->getId()]) }}">
                            @csrf
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('app.add_to_cart_product_show') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg" src="{{ URL::asset('storage/' . $viewData['product']->getName() . '.png') }}"
                    alt="office content 1">
            </div>
        </div>
    </section>
@endsection