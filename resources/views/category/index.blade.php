<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">Create Category</a>
    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->getName() }} - <a href="{{ route('categories.show', $category->getId()) }}">View</a> | <a
                    href="{{ route('categories.edit', $category->getId()) }}">Edit</a></li>
        @endforeach
    </ul>
@endsection
