@extends('layouts.app')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @if (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif
    @foreach ($viewData["reviews"] as $review)
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <p class="text-gray-700"><strong>Description:</strong> {{ $review->getDescription() }}</p>
            <div class="flex items-center mt-2">
                <p class="text-gray-700 mr-2"><strong>Rating:</strong></p>
                <div class="flex">
                    @for ($i = 0; $i < $review->getRating(); $i++)
                        <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 0l2.95 6.84 6.02.5c.91.07 1.3 1.18.63 1.79l-4.71 4.5 1.4 6.14c.21 1.02-.87 1.82-1.74 1.33L10 16.24l-5.55 3.52c-.87.49-1.95-.31-1.74-1.33l1.4-6.14-4.71-4.5c-.67-.61-.28-1.72.63-1.79l6.02-.5L10 0z" clip-rule="evenodd"/>
                        </svg>
                    @endfor
                </div>
            </div>
            <div class="mt-4">
                @if (auth()->check())
                    @if ($review->getUserId() === auth()->id())
                    <form action="{{ route('review.destroy', ['id'=> $review-> getId()]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Borrar</button>
                    </form>
                    <div class="btn-container mt-2">
                        <a href="{{ route('review.edit', ['id'=> $review->getId()]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                    </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
