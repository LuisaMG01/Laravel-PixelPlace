@extends('layouts.admin')
@section('headerEntity', __('admin.title_admin_challenges'))
@section('nameTable', __('admin.name_table_admin_challenges'))
@section('buttonEntity', __('admin.button_entity_admin_challenges'))
@section('content')
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

                        <table class='min-w-full bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700'>
                            <thead>
                                <tr>
                                    <th class='px-4 py-2 text-sm font-bold text-gray-500 uppercase dark:text-gray-400'>
                                        {{ __('admin.table_header_challenge_name_admin_challenges') }}
                                    </th>
                                    <th class='px-4 py-2 text-sm font-bold text-gray-500 uppercase dark:text-gray-400'>
                                        {{ __('admin.table_header_challenge_description_admin_challenges') }}</th>
                                    <th class='px-4 py-2 text-sm font-bold text-gray-500 uppercase dark:text-gray-400'>
                                        {{ __('admin.table_header_challenge_checked_admin_challenges') }}</th>
                                    <th class='px-4 py-2 text-sm font-bold text-gray-500 uppercase dark:text-gray-400'>
                                        {{ __('admin.table_header_challenge_coins_admin_challenges') }}</th>
                                    <th class='px-4 py-2 text-sm font-bold text-gray-500 uppercase dark:text-gray-400'>
                                        {{ __('admin.table_header_challenge_users_admin_challenges') }}</th>
                                    <th class='px-4 py-2 text-sm font-bold text-gray-500 uppercase dark:text-gray-400'>
                                        {{ __('admin.table_header_challenge_current_users_admin_challenges') }}</th>
                                    <th class='px-4 py-2 text-sm font-bold text-gray-500 uppercase dark:text-gray-400'>
                                        {{ __('admin.table_header_challenge_expiration_date_admin_challenges') }}</th>
                                    <th class='px-4 py-2 text-sm font-bold text-gray-500 uppercase dark:text-gray-400'>
                                        {{ __('admin.table_header_challenge_category_admin_challenges') }}</th>
                                    <th class='px-4 py-2 text-sm font-bold text-gray-500 uppercase dark:text-gray-400'>
                                        {{ __('admin.table_header_challenge_product_quantity_admin_challenges') }}</th>
                                </tr>
                            </thead>
                            <tbody class='divide-y divide-gray-200 dark:divide-gray-700'>
                                @foreach ($viewData['challenges'] as $challenge)
                                    <tr class='hover:bg-gray-100 dark:hover:bg-gray-700'>
                                        <td class='px-4 py-2 text-sm font-normal text-gray-500 dark:text-gray-400'>
                                            <div class='text-base font-semibold text-gray-900 dark:text-white'>
                                                {{ $challenge->getName() }}</div>
                                        </td>
                                        <td
                                            class='px-4 py-2 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                            {{ $challenge->getDescription() }}
                                        </td>
                                        <td
                                            class='max-w-sm px-4 py-2 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400'>
                                            @if ($challenge->getChecked())
                                                {{ __('admin.challenge_unchecked_admin_challenges') }}
                                            @else
                                                {{ __('admin.challenge_checked_admin_challenges') }}
                                            @endif
                                        </td>
                                        <td
                                            class='px-4 py-2 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                            {{ $challenge->getRewardCoins() }}
                                        </td>
                                        <td
                                            class='px-4 py-2 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                            {{ $challenge->getMaxUsers() }}
                                        </td>
                                        <td
                                            class='px-4 py-2 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                            {{ $challenge->getCurrentUsers() }}
                                        </td>
                                        <td
                                            class='px-4 py-2 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                            {{ $challenge->getExpirationDate() }}
                                        </td>
                                        <td
                                            class='px-4 py-2 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                            {{ $challenge->category->getName() }}
                                        </td>
                                        <td
                                            class='px-4 py-2 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white'>
                                            {{ $challenge->getCategoryQuantity() }}
                                        </td>

                                        <!-- Actions -->
                                        <td class='p-4 space-x-2 whitespace-nowrap'>
                                            <button type='button' id='updateProductButton'
                                                data-drawer-target='drawer-update-product-{{ $challenge->getId() }}'
                                                data-drawer-show='drawer-update-product-{{ $challenge->getId() }}'
                                                aria-controls='drawer-update-product-default' data-drawer-placement='right'
                                                class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>
                                                <svg class='w-4 h-4 mr-2' fill='currentColor' viewBox='0 0 20 20'
                                                    xmlns='http://www.w3.org/2000/svg'>
                                                    <path
                                                        d='M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z'>
                                                    </path>
                                                    <path fill-rule='evenodd'
                                                        d='M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z'
                                                        clip-rule='evenodd'></path>
                                                </svg>
                                                {{ __('admin.button_update_admin_challenges') }}
                                            </button>

                                            <button type='submit' id='deleteProductButton'
                                                data-drawer-target='drawer-delete-product-{{ $challenge->getId() }}'
                                                data-drawer-show='drawer-delete-product-{{ $challenge->getId() }}'
                                                aria-controls='drawer-delete-product-{{ $challenge->getId() }}'
                                                data-drawer-placement='right'
                                                class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900'>
                                                <svg class='w-4 h-4 mr-2' fill='currentColor' viewBox='0 0 20 20'
                                                    xmlns='http://www.w3.org/2000/svg'>
                                                    <path fill-rule='evenodd'
                                                        d='M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z'
                                                        clip-rule='evenodd'></path>
                                                </svg>
                                                {{ __('admin.button_delete_admin_challenges') }}
                                            </button>
                                    </tr>
                                    <!-- Edit Challenge Drawer -->
                                    <div id='drawer-update-product-{{ $challenge->getId() }}'
                                        class='fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800'
                                        tabindex='-1' aria-labelledby='drawer-label' aria-hidden='true'>
                                        <h5 id='drawer-label'
                                            class='inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400'>
                                            {{ __('admin.drawer_title_update_admin_challenges') }}</h5>
                                        <button type='button'
                                            data-drawer-dismiss='drawer-update-product-{{ $challenge->getId() }}'
                                            aria-controls='drawer-update-product-{{ $challenge->getId() }}'
                                            class='text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white'>
                                            <svg aria-hidden='true' class='w-5 h-5' fill='currentColor' viewBox='0 0 20 20'
                                                xmlns='http://www.w3.org/2000/svg'>
                                                <path fill-rule='evenodd'
                                                    d='M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z'
                                                    clip-rule='evenodd'></path>
                                            </svg>
                                            <span
                                                class='sr-only'>{{ __('admin.action_title_admin_close_menu_challenges') }}</span>
                                        </button>
                                        <form
                                            action='{{ route('admin.challenges.update', ['id' => $challenge->getId()]) }}'
                                            id='update-form-{{ $challenge->getId() }}' method='POST'>
                                            @csrf
                                            @method('PUT')
                                            <div class='space-y-4'>
                                                <div>
                                                    <label for='name'
                                                        class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>{{ __('admin.table_header_challenge_name_admin_challenges') }}</label>
                                                    <input type='text' name='name' id='name'
                                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'
                                                        value='{{ $challenge->getName() }}'>
                                                </div>
                                                <div>
                                                    <label for='description'
                                                        class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>{{ __('admin.table_header_challenge_description_admin_challenges') }}</label>
                                                    <input type='text' name='description' id='description'
                                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'
                                                        value='{{ $challenge->getDescription() }}'>
                                                </div>
                                                <div>
                                                    <label for='reward_coins'
                                                        class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>{{ __('admin.table_header_challenge_coins_admin_challenges') }}</label>
                                                    <input type='number' name='reward_coins' id='reward_coins'
                                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'
                                                        value='{{ $challenge->getRewardCoins() }}'>
                                                </div>
                                                <div>
                                                    <label for='max_users'
                                                        class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>{{ __('admin.table_header_challenge_users_admin_challenges') }}</label>
                                                    <input type='number' name='max_users' id='max_users'
                                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'
                                                        value='{{ $challenge->getMaxUsers() }}'>
                                                </div>
                                                <div>
                                                    <label for='category_id'
                                                        class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>{{ __('admin.table_header_challenge_category_admin_challenges') }}</label>
                                                    <select name='category_id' id='category_id'
                                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                                focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                                                dark:focus:ring-primary-500 dark:focus:border-primary-500
                                                                {{ $challenge->category->name === '' ? 'border-red-500' : '' }}'>
                                                        <option value='' disabled
                                                            {{ $challenge->category->name === '' ? 'selected' : '' }}>
                                                            {{ __('admin.button_selector_category_admin_challenges') }}
                                                        </option>
                                                        @foreach ($viewData['categories'] as $category)
                                                            <option value='{{ $category->id }}'
                                                                {{ $challenge->category->id === $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div>
                                                    <label for='expiration_date'
                                                        class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>{{ __('admin.table_header_challenge_expiration_date_admin_challenges') }}</label>
                                                    <input type='date' name='expiration_date' id='expiration_date'
                                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'
                                                        value='{{ $challenge->getExpirationDate() }}'>
                                                </div>
                                                <div>
                                                    <label for='category_quantity'
                                                        class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>{{ __('admin.table_header_challenge_product_quantity_admin_challenges') }}</label>
                                                    <input type='number' name='category_quantity' id='category_quantity'
                                                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'
                                                        value='{{ $challenge->getMaxUsers() }}'>
                                                </div>
                                                <div>
                                                    <label for="checked"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.table_header_challenge_checked_admin_challenges') }}</label>
                                                    <input type="hidden" name="checked" value="0">
                                                    <input type="checkbox" name="checked" id="checkedCheckbox"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        value="1" {{ $challenge->getChecked() ? 'checked' : '' }}>
                                                </div>

                                            </div>
                                            <div class='flex justify-center mt-10'>
                                                <button type='submit' id='updateProductButton'
                                                    data-drawer-target='drawer-update-product-default'
                                                    data-drawer-show='drawer-update-product-default'
                                                    aria-controls='drawer-update-product-default'
                                                    data-drawer-placement='right'
                                                    class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>
                                                    <svg class='w-4 h-4 mr-2' fill='currentColor' viewBox='0 0 20 20'
                                                        xmlns='http://www.w3.org/2000/svg'>
                                                        <path
                                                            d='M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z'>
                                                        </path>
                                                        <path fill-rule='evenodd'
                                                            d='M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z'
                                                            clip-rule='evenodd'></path>
                                                    </svg>
                                                    {{ __('admin.button_update_admin_challenges') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <div id='drawer-delete-product-{{ $challenge->getId() }}'
                                        class='fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800'
                                        tabindex='-1' aria-labelledby='drawer-label' aria-hidden='true'>
                                        <h5 id='drawer-label'
                                            class='inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400'>
                                            {{ __('admin.drawer_title_delete_admin_challenges') }}
                                        </h5>
                                        <button type='submit'
                                            data-drawer-dismiss='drawer-delete-product-{{ $challenge->getId() }}'
                                            aria-controls='drawer-delete-product-{{ $challenge->getId() }}'
                                            class='text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white'>
                                            <svg aria-hidden='true' class='w-5 h-5' fill='currentColor'
                                                viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                                                <path fill-rule='evenodd'
                                                    d='M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z'
                                                    clip-rule='evenodd'></path>
                                            </svg>
                                            <span
                                                class='sr-only'>{{ __('admin.action_title_admin_close_menu_challenges') }}</span>
                                        </button>
                                        <svg class='w-10 h-10 mt-8 mb-4 text-red-600' fill='none'
                                            stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'>
                                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2'
                                                d='M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'></path>
                                        </svg>
                                        <h3 class='mb-6 text-lg text-gray-500 dark:text-gray-400'>
                                            {{ __('admin.delete_confirmation_admin_challenges') }}</h3>
                                        <form id='delete-form-{{ $challenge->getId() }}'
                                            action='{{ route('admin.challenges.destroy', ['id' => $challenge->getId()]) }}'
                                            method='POST'>
                                            @csrf
                                            @method('DELETE')
                                            <button type='submit'
                                                class='text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900'>
                                                {{ __('admin.delete_confirm_button_admin_challenges') }}
                                            </button>
                                        </form>
                                        <a href='#'
                                            class='text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700'
                                            data-drawer-hide='drawer-delete-product-default'>
                                            {{ __('admin.delete_cancel_button_admin_challenges') }}
                                        </a>
                                    </div>
                                @endforeach

                            </tbody>
                        </table>
                        </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    @include('partials.pagination', ['paginator' => $viewData['challenges']])


    <!-- Add Challenge -->
    <div id='drawer-create-product-default'
        class='fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800'
        tabindex='-1' aria-labelledby='drawer-label' aria-hidden='true'>
        <h5 id='drawer-label'
            class='inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400'>
            {{ __('admin.drawer_title_create_admin_challenges') }}</h5>
        <button type='button' data-drawer-dismiss='drawer-create-product-default'
            aria-controls='drawer-create-product-default'
            class='text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white'>
            <svg aria-hidden='true' class='w-5 h-5' fill='currentColor' viewBox='0 0 20 20'
                xmlns='http://www.w3.org/2000/svg'>
                <path fill-rule='evenodd'
                    d='M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z'
                    clip-rule='evenodd'></path>
            </svg>
            <span class='sr-only'>{{ __('admin.action_title_admin_close_menu_challenges') }}</span>
        </button>
        <form method='POST' action='{{ route('admin.challenges.store') }}'>
            @csrf
            <div class='space-y-4'>
                <div>
                    <label for='name'
                        class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>{{ __('admin.table_header_challenge_name_admin_challenges') }}</label>
                    <input type='text' name='name' id='name'
                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                </div>
                <div>
                    <label for='description'
                        class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>{{ __('admin.table_header_challenge_description_admin_challenges') }}</label>
                    <input id='description' name = 'description' rows='4'
                        class='block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                </div>
                <div>
                    <label for='reward_coins'
                        class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>{{ __('admin.table_header_challenge_coins_admin_challenges') }}</label>
                    <input type='number' name='reward_coins' id='reward_coins'
                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                </div>
                <div>
                    <label for='max_users'
                        class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>{{ __('admin.table_header_challenge_users_admin_challenges') }}</label>
                    <input type='number' name='max_users' id='max_users'
                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                </div>
                <div>
                    <label for='expiration_date'
                        class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>{{ __('admin.table_header_challenge_expiration_date_admin_challenges') }}</label>
                    <input type='date' name='expiration_date' id='expiration_date'
                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                </div>
                <div class='mb-4'>
                    <label for='category_id'
                        class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>{{ __('admin.table_header_challenge_category_admin_challenges') }}</label>
                    <select name='category_id' id='category_id'
                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'
                        required>
                        <option value='' disabled selected>
                            {{ __('admin.button_selector_category_admin_challenges') }}</option>
                        @foreach ($viewData['categories'] as $category)
                            <option value='{{ $category->id }}'>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for='category_quantity'
                        class='block mb-2 text-sm font-medium text-gray-900 dark:text-white'>{{ __('admin.table_header_challenge_product_quantity_admin_challenges') }}</label>
                    <input type='number' name='category_quantity' id='category_quantity'
                        class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500'>
                </div>
                <div class='flex justify-center mt-10'>
                    <button id='createProductButton'
                        class='text-black bg-white hover:bg-gray-200 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 border border-gray-300 focus:outline-none'
                        type='submit' data-drawer-target='drawer-create-product-default'
                        data-drawer-show='drawer-create-product-default' aria-controls='drawer-create-product-default'
                        data-drawer-placement='right'>
                        {{ __('admin.action_title_add_challenge_admin_challenges') }}
                    </button>
                </div>
        </form>
    </div>
@endsection
