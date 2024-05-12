<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('icons/ghost.png') }}" class="h-8" alt="Flowbite Logo" />
            <span
                class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ __('app.title_navbar_home') }}</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <div class="space-x-4">
                @guest
                    <a href='{{ route('register') }}'
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('app.register_button_navbar') }}</a>
                    <a href='{{ route('login') }}'
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-4">{{ __('app.login_button_navbar') }}</a>
                @else
                    <div class="flex items-center space-x-3 rtl:space-x-reverse">
                        <div>
                            <img src="{{ asset('icons/balance.gif') }}" class="h-8" alt="GIF" />
                        </div>
                        <div>
                            ${{ auth()->user()->getBalance() }}
                        </div>
                        <div>
                            <a href="{{ route('cart.index') }}">
                                <img src="{{ asset('icons/cart.gif') }}" class="h-8" alt="GIF" />
                            </a>
                        </div>

                        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                            class="flex items-center text-sm pe-1 font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:me-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white"
                            type="button">
                            <span class="sr-only">{{ __('app.dropdown_avatar_alt') }}</span>
                            <img class="w-8 h-8 me-2 rounded-full"
                                src="{{ URL::asset('storage/' . Auth::user()->getName() . '.png') }}" alt="user photo">
                            {{ Auth::user()->getName() }}
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownAvatarName"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div class="font-medium ">{{ Auth::user()->getName() }}</div>
                                <div class="truncate">{{ Auth::user()->getEmail() }}</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                                <li>
                                    <a href="{{ route('user.settings') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('app.settings_dropdown_navbar') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.orders') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('app.my_orders_dropdown_navbar') }}</a>
                                </li>
                            </ul>
                            <div class="py-2">
                                <form action="{{ route('logout') }}" method="POST" id="logout">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        onclick="document.getElementById('logout').submit();">{{ __('app.sign_out_dropdown_navbar') }}</a>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                @endguest
            </div>
            <button data-collapse-toggle="navbar-cta" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">{{ __('app.open_main_menu_icon_alt') }}</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('home') }}"
                        class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500"
                        aria-current="page">{{ __('app.home_navbar') }}</a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('app.products_navbar') }}</a>
                </li>
                <li>
                    <a href="{{ Auth::check() ? route('challenges.indexUser', ['id' => Auth::id()]) : route('challenges.index') }}"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 d:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('app.challenges_navbar') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
