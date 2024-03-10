@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear reto</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul id="errors" class="alert alert-danger list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('challenge.store') }}">
                            @csrf
                            <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" required />
                            <input type="text" class="form-control mb-2" placeholder="Enter description" name="description" value="{{ old('description') }}" required />
                            <input type="text" class="form-control mb-2" placeholder="Enter reward coins" name="reward_coins" value="{{ old('reward_coins') }}" required />
                            <input type="text" class="form-control mb-2" placeholder="Enter max users" name="max_users" value="{{ old('max_users') }}" required />
                            
                            <select class="form-control mb-2" name="category_id" required>
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            
                            <div class="mb-3">
                                <label for="expiration_date" class="form-label">Expiration Date:</label>
                                <input type="date" class="form-control" id="expiration_date" name="expiration_date" required>
                            </div>
                            <input type="text" class="form-control mb-2" placeholder="Enter category quantity" name="category_quantity" value="{{ old('category_quantity') }}" required />

                            <input type="submit" class="button_form" value="Send" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
