@extends('layouts.app')

@section('title', "create")
@section('subtitle', "create")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h4><strong>CREATE CHALLENGE<strong></h4>
                </div>
                <div class="card-body">
                    {{-- Display validation errors --}}
                    @if($errors->any())
                        <ul id="errors" class="alert alert-danger list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {{-- Display success message --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Create challenge form --}}
                    <form method="POST" action="{{ route('challenge.store') }}">
                        @csrf
                        {{-- Name input --}}
                        <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" required />

                        {{-- Description input --}}
                        <input type="text" class="form-control mb-2" placeholder="Enter description" name="description" value="{{ old('description') }}" required />

                        {{-- Reward coins input --}}
                        <input type="text" class="form-control mb-2" placeholder="Enter reward coins" name="reward_coins" value="{{ old('reward_coins') }}" required />

                        {{-- Max users input --}}
                        <input type="text" class="form-control mb-2" placeholder="Enter max users" name="max_users" value="{{ old('max_users') }}" required />

                        {{-- Product name input --}}
                        <input type="text" class="form-control mb-2" placeholder="Enter product name" name="product_name" value="{{ old('product_name') }}" required />

                        {{-- Product quantity input --}}
                        <input type="text" class="form-control mb-2" placeholder="Enter product quantity" name="product_quantity" value="{{ old('product_quantity') }}" required />

                        {{-- Submit button --}}
                        <input type="submit" class="button_form" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
