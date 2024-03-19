@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ __('app.cart_error') }}</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Join the Gamer Revolution at PixelPlace!</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">At
                    PixelPlace, we don't just sell gamer products, we build a community! Take part in thrilling challenges
                    and showcase your skills. Ready for the challenge? Complete our challenges and secure a discount on your
                    next purchase!</p>
                @auth
                    <a href="{{ route('products.index') }}"
                        class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        See Products
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        Login
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="{{ route('register') }}"
                        class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        Register
                    </a>
                @endauth
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('banner.jpg') }}" alt="mockup">
            </div>
        </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl font-extrabold text-gray-900 dark:text-white">Why Choose PixelPlace?</h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-400">Discover why gamers all over the world trust
                    PixelPlace for their gaming needs. From top-quality products to unparalleled customer service, we've got
                    everything you need to take your gaming experience to the next level.</p>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 3a7 7 0 00-7 7c0 3.866 3.134 7 7 7s7-3.134 7-7a7 7 0 00-7-7zM8 7a1 1 0 011-1h2a1 1 0 010 2H9a1 1 0 01-1-1zm4 1a1 1 0 00-1-1H9a1 1 0 100 2h2a1 1 0 001-1zm-3 3a1 1 0 100 2h1a1 1 0 100-2H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Top-Quality Products</h3>
                    <p class="text-gray-500 dark:text-gray-400">Explore our curated selection of top-quality gaming gear,
                        from cutting-edge peripherals to high-performance hardware, all designed to elevate your gaming
                        experience.</p>
                </div>
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 4.707a1 1 0 011.414 0L10 8.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Fast and Secure Shipping</h3>
                    <p class="text-gray-500 dark:text-gray-400">Enjoy fast and secure shipping options worldwide. With our
                        efficient logistics network, your gaming gear will be at your doorstep in no time, ready to fuel
                        your gaming adventures.</p>
                </div>
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3.243 8a1 1 0 01.572-.912l8-3A1 1 0 0112 5v10a1 1 0 01-1.185.992l-8-2A1 1 0 012 13V8.618A1 1 0 013.243 8zM17 4a1 1 0 00-1 1v10a1 1 0 001.184.992l8-2A1 1 0 0020 13V5a1 1 0 00-1-1h-6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">24/7 Customer Support</h3>
                    <p class="text-gray-500 dark:text-gray-400">Got questions or need assistance? Our dedicated customer
                        support team is available 24/7 to provide you with expert assistance and ensure a seamless shopping
                        experience.</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div id="default-carousel" class="relative w-full max-w-screen-md mx-auto" data-carousel="slide">
            <div class="flex items-center justify-center h-full">
                <h2 class="mb-4 text-4xl font-extrabold text-gray-900 dark:text-white">Top 5 most popular products</h2>
            </div>
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                @foreach ($viewData['products'] as $product)
                    <div class="hidden duration-700 ease-in-out flex justify-center items-center" data-carousel-item>
                        <a href="{{ route('products.show', ['id' => $product->getId()]) }}" class="flex flex-col items-center justify-center bg-white border border-gray-200 rounded-lg shadow-md md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ URL::asset('storage/'.$product->getName().'.png') }}" alt="product image">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->getName() }}</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->getDescription() }}</p>
                                <div class="flex items-center mt-2.5 mb-5">
                                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $product->getRating())
                                                <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                            @else
                                                <svg class="w-4 h-4 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                            @endif
                                        @endfor
                                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{ $product->getRating() }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none text-gray-900 dark:text-gray-100" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-300 dark:bg-gray-700 group-hover:bg-gray-400 dark:group-hover:bg-gray-600 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-600 dark:text-gray-200 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none text-gray-900 dark:text-gray-100" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-300 dark:bg-gray-700 group-hover:bg-gray-400 dark:group-hover:bg-gray-600 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-600 dark:text-gray-200 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </section>
@endsection
