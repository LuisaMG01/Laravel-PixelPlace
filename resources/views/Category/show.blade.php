<!-- resources/views/categories/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $category->name }}</h1>
    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
