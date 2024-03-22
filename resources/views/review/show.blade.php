@extends('layouts.app')
@section('content')
    @foreach ($viewData['reviews'] as $review)
        <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
            <div class="max-w-2xl mx-auto px-4">
                <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                <img class="mr-2 w-6 h-6 rounded-full"
                                    src="{{ URL::asset('storage/' . $review->user->getName() . '.png') }}"
                                    alt="img">{{ $review->user->getName() }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                    title="February 8th, 2022">{{ $review->getCreatedAt() }}</time></p>
                        </div>
                        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            type="button">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 16 3">
                                <path
                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        @if (auth()->check())
                            @if ($review->getUserId() === auth()->id())
                                <div id="dropdownComment1"
                                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownMenuIconHorizontalButton">
                                        <li>
                                            <a href="{{ route('reviews.edit', ['id' => $review->getId()]) }}"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('reviews.destroy', ['id' => $review->getId()]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        @endif
                    </footer>
                    <p class="text-gray-500 dark:text-gray-400">{{ $review->getDescription() }}</p>
                    <div class="flex">
                        @for ($i = 0; $i < $review->getRating(); $i++)
                            <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 0l2.95 6.84 6.02.5c.91.07 1.3 1.18.63 1.79l-4.71 4.5 1.4 6.14c.21 1.02-.87 1.82-1.74 1.33L10 16.24l-5.55 3.52c-.87.49-1.95-.31-1.74-1.33l1.4-6.14-4.71-4.5c-.67-.61-.28-1.72.63-1.79l6.02-.5L10 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        @endfor
                    </div>
                </article>
            </div>
        </section>
    @endforeach
    <!-- Pagination -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
        @include('partials.pagination', ['paginator' => $viewData['reviews']])
    </div>
@endsection
