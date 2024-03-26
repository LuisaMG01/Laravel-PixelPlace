@extends('layouts.app')
@section('content')
    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-md">
        <div class="px-6 py-4">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{ __('app.update_button_review_edit') }}</h2>
            <form method="POST" action="{{ route('reviews.update', ['id' => $viewData['review']->getId()]) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">{{ __('app.description_review_edit') }}:</label>
                    <input type="text" name="description" id="description"
                        class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300"
                        value="{{ $viewData['review']->getDescription() }}">
                </div>

                <div class="mb-4">
                    <label for="rating" class="block text-gray-700 text-sm font-bold mb-2">{{ __('app.rating_review_edit') }}:</label>
                    <select name="rating" id="rating"
                        class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" @if ($i == $viewData['review']->getRating()) selected @endif>
                                {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('app.update_review_button') }}</button>
            </form>
        </div>
    </div>
@endsection
