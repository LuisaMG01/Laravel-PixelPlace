@extends('layouts.header')
@section('content')
<form method="POST" action="{{ route('review.update', ['id'=> $viewData['review']-> getId()]) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="description">Descripción:</label>
        <input type="text" name="description" id="description" class="form-control" value="{{ $viewData['review']->getDescription() }}">
    </div>

    <div class="form-group">
        <label for="rating">rating:</label>
        <input type="text" name="rating" id="rating" class="form-control" value="{{ $viewData['review']->getRating() }}">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar Review</button>
</form>
@endsection