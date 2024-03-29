@extends('layouts.admin')
@section('headerEntity', __('admin.title_admin_users'))
@section('nameTable', __('admin.name_table_admin_users'))
@section('buttonEntity', __('admin.button_entity_admin_users'))
@section('content')
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ __('admin.success_message_admin_users') }}</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <!--Table Header-->
        @include('partials.admin.adminTableHeader')
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <!--Columns -->
                            <tr>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    {{ __('admin.table_header_user_nickname_admin_users') }}
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    {{ __('admin.table_header_user_email_admin_users') }}
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    {{ __('admin.table_header_user_balance_admin_users') }}
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    {{ __('admin.table_header_user_role_admin_users') }}
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    {{ __('admin.table_header_actions_admin_users') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <!-- Object Values -->
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        <div class="text-base font-semibold text-gray-900 dark:text-white">
                                            {{ $user->getName() }}</div>
                                    </td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->getEmail() }}</td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->getBalance() }}
                                    </td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->getRole() }}
                                    </td>

                                    <!-- Actions -->
                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <button type="button" id="updateUserButton"
                                            data-drawer-target="drawer-update-user-{{ $user->getId() }}"
                                            data-drawer-show="drawer-update-user-{{ $user->getId() }}"
                                            aria-controls="drawer-update-user-{{ $user->getId() }}"
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
                                            {{ __('admin.button_update_admin_users') }}
                                        </button>

                                        <button type="button" id="deleteUserButton"
                                            data-drawer-target="drawer-delete-user-{{ $user->getId() }}"
                                            data-drawer-show="drawer-delete-user-{{ $user->getId() }}"
                                            aria-controls="drawer-delete-user-{{ $user->getId() }}"
                                            data-drawer-placement="right"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            {{ __('admin.button_delete_admin_users') }}
                                        </button>
                                    </td>
                                </tr>

                                <!-- Edit Product Drawer -->
                                <div id="drawer-update-user-{{ $user->getId() }}"
                                    class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
                                    tabindex="-1" aria-labelledby="drawer-label-{{ $user->getId() }}" aria-hidden="true">
                                    <h5 id="drawer-label-{{ $user->getId() }}"
                                        class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                                        {{ __('admin.drawer_title_update_admin_users') }}</h5>
                                    <button type="button" data-drawer-dismiss="drawer-update-user-{{ $user->getId() }}"
                                        aria-controls="drawer-update-user-{{ $user->getId() }}"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close menu</span>
                                    </button>
                                    <form action="{{ route('admin.users.update', ['id' => $user->getId()]) }}"
                                        id="update-form-{{ $user->getId() }}" method='POST'>
                                        @csrf
                                        @method('PUT')
                                        <div class="space-y-4">
                                            <div>
                                                <label for="name-{{ $user->getId() }}"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_nickname_admin_users') }}</label>
                                                <input type="text" name="name" id="name-{{ $user->getId() }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    value="{{ $user->getName() }}"
                                                    placeholder="{{ __('admin.nickname_placeholder_admin_user') }}"
                                                    required="">
                                            </div>
                                            <div>
                                                <label for="role-{{ $user->getId() }}"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_role_admin_users') }}</label>
                                                <select id="role-{{ $user->getId() }}" name="role"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option value="admin"
                                                        {{ $user->getRole() === 'admin' ? 'selected' : '' }}>
                                                        {{ __('admin.select_admin_admin_user') }}</option>
                                                    <option value="client"
                                                        {{ $user->getRole() === 'client' ? 'selected' : '' }}>
                                                        {{ __('admin.select_client_admin_user') }}
                                                    </option>
                                                </select>
                                            </div>

                                            <div>
                                                <label for="email-{{ $user->getId() }}"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_email_admin_users') }}</label>
                                                <input type="email" name="email" id="email-{{ $user->getId() }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    value="{{ $user->getEmail() }}"
                                                    placeholder="{{ __('admin.email_placeholder_admin_user') }}"
                                                    required="">
                                            </div>
                                            <div>
                                                <label for="balance-{{ $user->getId() }}"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.input_label_balance_admin_users') }}</label>
                                                <input type="numeric" name="balance" id="balance-{{ $user->getId() }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    value="{{ $user->getBalance() }}"
                                                    placeholder="{{ __('admin.balance_placeholder_admin_user') }}"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="flex justify-center mt-10">
                                            <button type="submit" id="updateUserButton"
                                                data-drawer-target="drawer-update-user-{{ $user->getId() }}"
                                                data-drawer-show="drawer-update-user-{{ $user->getId() }}"
                                                aria-controls="drawer-update-user-{{ $user->getId() }}"
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
                                                {{ __('admin.button_update_admin_users') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Delete Product Drawer -->
                                <div id="drawer-delete-user-{{ $user->getId() }}"
                                    class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
                                    tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                                    <h5 id="drawer-label"
                                        class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
                                        {{ __('admin.drawer_title_delete_admin_users') }}
                                    </h5>
                                    <button type="button" data-drawer-dismiss="drawer-delete-user-{{ $user->getId() }}"
                                        aria-controls="drawer-delete-user-{{ $user->getId() }}"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">
                                        {{ __('admin.delete_confirmation_admin_users') }}</h3>
                                    <form id="delete-form-{{ $user->getId() }}"
                                        action="{{ route('admin.users.destroy', ['id' => $user->getId()]) }}"
                                        method='POST'>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900">
                                            {{ __('admin.delete_confirm_button_admin_users') }}
                                        </button>
                                    </form>
                                    <a href="#"
                                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                                        data-drawer-hide="drawer-delete-user-{{ $user->getId() }}">
                                        {{ __('admin.delete_cancel_button_admin_users') }}
                                    </a>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    @include('partials.pagination', ['paginator' => $users])


    <!-- Add Product Drawer -->
    <div id="drawer-create-product-default"
        class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
        tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
        <h5 id="drawer-label"
            class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">
            {{ __('admin.drawer_title_add_new_user_admin_users') }}</h5>
        <button type="button" data-drawer-dismiss="drawer-create-product-default"
            aria-controls="drawer-create-product-default"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <form action="{{ route('admin.users.store') }}" method='POST'>
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.table_header_user_nickname_admin_users') }}</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="{{ __('admin.nickname_placeholder_admin_user') }}" required="">
                </div>
                <div>
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.table_header_user_email_admin_users') }}</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="{{ __('admin.email_placeholder_admin_user') }}" required="">
                </div>
                <div>
                    <label for="balance"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.table_header_user_balance_admin_users') }}</label>
                    <input type="numeric" name="balance" id="balance"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="{{ __('admin.balance_placeholder_admin_user') }}" required="">
                </div>
                <div>
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.table_header_user_password_admin_users') }}</label>
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="{{ __('admin.password_placeholder_admin_user') }}" required="">
                </div>
                <div>
                    <label for="role"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin.table_header_user_role_admin_users') }}</label>
                    <select name="role" id="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option>{{ __('admin.select_admin_admin_user') }}</option>
                        <option>{{ __('admin.select_client_admin_user') }}</option>
                    </select>
                </div>
                <div class="flex justify-center mt-10">
                    <button id="createUserButton"
                        class="text-black bg-white hover:bg-gray-200 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 border border-gray-300 focus:outline-none"
                        type="submit" data-drawer-target="drawer-create-product-default"
                        data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default"
                        data-drawer-placement="right">
                        {{ __('admin.button_add_new_user_admin_users') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
