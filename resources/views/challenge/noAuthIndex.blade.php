@extends('layouts.app')
@section('content')

<div class="col-span-full text-center font-bold text-3xl text-blue-700 mt-8 mb-4">⭐ {{__('app.title_index_challenge')}} ⭐</div>
</br>
@include('partials.breadcrumb', ['viewData' => $viewData])
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 justify-center">
    @foreach($viewData['challenges'] as $challenge)
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">{{ $challenge->getName() }}</h5>
            <p class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">{{__('app.index_challenge_description')}}{{ $challenge->getDescription() }}</p>
            <ul role="list" class="space-y-3 my-5">
            </br>
                <li class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">{{__('app.index_challenge_reward')}} {{ $challenge->getRewardCoins() }} {{__('app.index_challenge_coins')}}</span>
                </li>
                <li class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">{{__('app.index_challenge_max_users')}} {{ $challenge->getMaxUsers() }}</span>
                </li>
                <li class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">{{__('app.index_challenge_current_users')}} {{ $challenge->getCurrentUsers() }}</span>
                </li>
                <li class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">{{__('app.index_challenge_expiration_date')}} {{ $challenge->getExpirationDate() }}</span>
                </li>
                <li class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">{{__('app.index_challenge_category')}} {{ $challenge->category->getName() }}</span>
                </li>
                <li class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">{{__('app.index_challenge_goal')}} {{ $challenge->getCategoryQuantity() }}</span>
                </li>
                </br>
            </ul>
        </div>
    @endforeach
</div>

@endsection
