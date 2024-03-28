<aside id="sidebar"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-screen pt-16 font-normal duration-75 lg:flex transition-width"
    aria-label="Sidebar">
    <div
        class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="pb-2 space-y-2">
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                            <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3" sidebar-toggle-item>{{ __('admin.sidebar_home') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href='{{ route('admin.products.index') }}'
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                            aria-controls="dropdown-layouts" data-collapse-toggle="dropdown-layouts">
                            <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                color="#9b9b9b" fill="none">
                                <path
                                    d="M4.5 10.2653V6H19.5V10.2653C19.5 13.4401 19.5 15.0275 18.5237 16.0137C17.5474 17 15.976 17 12.8333 17H11.1667C8.02397 17 6.45262 17 5.47631 16.0137C4.5 15.0275 4.5 13.4401 4.5 10.2653Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M4.5 6L5.22115 4.46154C5.78045 3.26838 6.06009 2.6718 6.62692 2.3359C7.19375 2 7.92084 2 9.375 2H14.625C16.0792 2 16.8062 2 17.3731 2.3359C17.9399 2.6718 18.2196 3.26838 18.7788 4.46154L19.5 6"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M10.5 9H13.5" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <path
                                    d="M12 19.5V22M12 19.5L7 19.5M12 19.5H17M7 19.5H4.5C3.11929 19.5 2 20.6193 2 22M7 19.5V22M17 19.5H19.5C20.8807 19.5 22 20.6193 22 22M17 19.5V22"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap"
                                sidebar-toggle-item>{{ __('admin.sidebar_products_index') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href='{{ route('admin.challenges.index') }}'
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                            aria-controls="dropdown-crud" data-collapse-toggle="dropdown-crud">
                            <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                color="#9b9b9b" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.62511 3.48153C7.93831 2.76299 8.0949 2.40372 8.40625 2.20186C8.71759 2 9.11512 2 9.91019 2H14.0898C14.8849 2 15.2824 2 15.5938 2.20186C15.9051 2.40372 16.0617 2.76299 16.3749 3.48153L18.3939 8.11373C18.8919 9.25629 19.1409 9.82757 18.9175 10.3168C18.6941 10.806 18.0944 11.0026 16.895 11.3957L12 13L7.10497 11.3957C5.90561 11.0026 5.30592 10.806 5.08249 10.3168C4.85905 9.82757 5.10806 9.25629 5.60607 8.11374L7.62511 3.48153Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12 13L8.5 2.5M15.5 11.5L12 2" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M12.7774 13.6499L13.5693 15.2468C13.6773 15.4691 13.9653 15.6823 14.2083 15.7231L15.6436 15.9636C16.5615 16.1178 16.7775 16.7893 16.1161 17.4516L15.0002 18.5767C14.8112 18.7673 14.7077 19.1347 14.7662 19.3979L15.0857 20.7906C15.3377 21.893 14.7572 22.3195 13.7898 21.7433L12.4445 20.9403C12.2015 20.7952 11.801 20.7952 11.5536 20.9403L10.2082 21.7433C9.24533 22.3195 8.66039 21.8885 8.91236 20.7906L9.23183 19.3979C9.29032 19.1347 9.18683 18.7673 8.99785 18.5767L7.88198 17.4516C7.22505 16.7893 7.43653 16.1178 8.35443 15.9636L9.78977 15.7231C10.0282 15.6823 10.3162 15.4691 10.4242 15.2468L11.2161 13.6499C11.6481 12.7834 12.35 12.7834 12.7774 13.6499Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap"
                                sidebar-toggle-item>{{ __('admin.sidebar_challenges_index') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                            <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                color="#9b9b9b" fill="none">
                                <path d="M14 9H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M14 12.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <rect x="2" y="3" width="20" height="18" rx="5" stroke="currentColor"
                                    stroke-width="1.5" stroke-linejoin="round" />
                                <path d="M5 16C6.20831 13.4189 10.7122 13.2491 12 16" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M10.5 9C10.5 10.1046 9.60457 11 8.5 11C7.39543 11 6.5 10.1046 6.5 9C6.5 7.89543 7.39543 7 8.5 7C9.60457 7 10.5 7.89543 10.5 9Z"
                                    stroke="currentColor" stroke-width="1.5" />
                            </svg>
                            <span class="ml-3" sidebar-toggle-item>{{ __('admin.sidebar_users_index') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                            <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                color="#9b9b9b" fill="none">
                                <path
                                    d="M14.5 6C15.2766 6 15.6649 6 15.9711 6.12687C16.3795 6.29602 16.704 6.62048 16.8731 7.02886C17 7.33515 17 7.72343 17 8.5C17 9.27657 17 9.66485 16.8731 9.97114C16.704 10.3795 16.3795 10.704 15.9711 10.8731C15.6649 11 15.2766 11 14.5 11L9.5 11C8.72343 11 8.33515 11 8.02886 10.8731C7.62048 10.704 7.29602 10.3795 7.12687 9.97114C7 9.66485 7 9.27657 7 8.5C7 7.72343 7 7.33515 7.12687 7.02886C7.29602 6.62048 7.62048 6.29602 8.02886 6.12687C8.33515 6 8.72343 6 9.5 6L14.5 6Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M11 17H9M9 17L7 17M9 17L9 19M9 17L9 15" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                                <path d="M17 18V16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M21 13V11C21 7.25027 21 5.3754 20.0451 4.06107C19.7367 3.6366 19.3634 3.26331 18.9389 2.95491C17.6246 2 15.7497 2 12 2C8.25027 2 6.3754 2 5.06107 2.95491C4.6366 3.26331 4.26331 3.6366 3.95491 4.06107C3 5.3754 3 7.25027 3 11V13C3 16.7497 3 18.6246 3.95491 19.9389C4.26331 20.3634 4.6366 20.7367 5.06107 21.0451C6.3754 22 8.25027 22 12 22C15.7497 22 17.6246 22 18.9389 21.0451C19.3634 20.7367 19.7367 20.3634 20.0451 19.9389C21 18.6246 21 16.7497 21 13Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            <span class="ml-3" sidebar-toggle-item>{{ __('admin.sidebar_categories_index') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders.index') }}"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                            <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                color="#9b9b9b" fill="none">
                                <path
                                    d="M14 18C18.4183 18 22 14.4183 22 10C22 5.58172 18.4183 2 14 2C9.58172 2 6 5.58172 6 10C6 14.4183 9.58172 18 14 18Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M3.15657 11C2.42523 12.1176 2 13.4535 2 14.8888C2 18.8162 5.18378 22 9.11116 22C10.5465 22 11.8824 21.5748 13 20.8434"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M15.7712 8.20518C15.555 7.29304 14.4546 6.46998 13.1337 7.08573C11.8128 7.70148 11.603 9.68263 13.601 9.89309C14.5041 9.98822 15.0928 9.78271 15.6319 10.364C16.1709 10.9453 16.2711 12.562 14.8931 12.9977C13.5151 13.4333 12.1506 12.7526 12.002 11.7859M13.9862 6.00415V6.87319M13.9862 13.1318V14.0042"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <span class="ml-3" sidebar-toggle-item>{{ __('admin.sidebar_orders_index') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>

<div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
