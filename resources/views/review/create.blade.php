@extends('layouts.app')
@section('content')
    <div class="container">
    @include('partials.breadcrumb', ['viewData' => $viewData])
        <div class="mx-auto max-w-lg mt-10">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-2xl font-semibold mb-6">{{ __('app.add_comment_review_create') }}</h1>
                <form method="POST" action="{{ route('reviews.store') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $viewData['productId'] }}">
                    <div class="mb-4">
                        <label for="description"
                            class="block text-gray-700 text-sm font-bold mb-2">{{ __('app.description_review_create') }}</label>
                        <textarea id="description" name="description"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                            placeholder="{{ __('app.enter_description_review_create') }}" rows="4">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('app.rating_review_create') }}</label>
                        <div class="flex">
                            <div id="stars" class="flex">
                                <input type="hidden" name="rating" value="0">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="star h-8 w-8 fill-current text-gray-400" data-value="{{ $i }}"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-star">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                    </svg>
                                @endfor
                            </div>
                            <div id="rating-label" class="ml-2 text-gray-700 font-semibold">0</div>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('app.send_review_create') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
