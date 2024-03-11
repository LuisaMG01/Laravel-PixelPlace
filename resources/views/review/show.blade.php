@extends('layouts.header')
@section('content')
<div class="row">
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    @foreach ($viewData["reviews"] as $review)
    <div class="card">
        <div class="card-body">
            <p class="card-text"><strong>ID:</strong> {{ $review->getId() }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $review->getDescription() }}</p>
            <p class="card-text"><strong>Rating:</strong> {{ $review->getRating() }}</p>
            <div class="text-center">
                <form action="{{ route('review.destroy', ['id'=> $review-> getId()]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
    
</div>
@endsection