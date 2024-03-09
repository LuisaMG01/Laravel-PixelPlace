@extends('layouts.app')

@section('title', Show)
@section('subtitle', Show)

@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <!-- Display GIF -->
            <iframe src="https://giphy.com/embed/iveeLKoMqMGp65Ovlf" width="340" height="340" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
            <p></p> 
        </div>
        <div class="col-md-8 text-center">
            <div class="card-body">
                <!-- Display Challenge Name -->
                <h1 class="card-title">{{ $viewData["challenge"]["name"] }}</h1>
                <!-- Display Challenge Description -->
                <h6 class="card-text"><strong>{{ $viewData["challenge"]["description"] }}</strong></h6>
                <div class="d-flex text-center">
                    <!-- Display Challenge Name -->
                    <h6 class="ml-3"><strong>Name: </strong>{{ $viewData["challenge"]["name"] }}</h6>
                </div>
                <div class="d-flex text-center">
                    <!-- Display Challenge Checked Status -->
                    <h6 class="ml-3"><strong>Checked: </strong>{{ $viewData["challenge"]["checked"] }}</h6>
                </div>
                <div class="d-flex text-center">
                    <!-- Display Challenge Reward Coins -->
                    <h6 class="ml-3"><strong>Reward Coins: </strong>{{ $viewData["challenge"]["reward_coins"] }}</h6>
                </div>
                <div class="d-flex text-center">
                    <!-- Display Challenge Max Users -->
                    <h6 class="ml-3"><strong>Max Users: </strong>{{ $viewData["challenge"]["max_users"] }}</h6>
                </div>
                <div class="d-flex text-center">
                    <!-- Display Challenge Current Users -->
                    <h6 class="ml-3"><strong>Current Users: </strong>{{ $viewData["challenge"]["current_users"] }}</h6>
                </div>
                <div class="d-flex text-center">
                    <!-- Display Challenge Product Name -->
                    <h6 class="ml-3"><strong>Product Name: </strong>{{ $viewData["challenge"]["product_name"] }}</h6>
                </div>
                <div class="d-flex text-center">
                    <!-- Display Challenge Product Quantity -->
                    <h6 class="ml-3"><strong>Product Quantity: </strong>{{ $viewData["challenge"]["product_quantity"] }}</h6>
                </div>
            </div>
            <!-- Delete Challenge Form -->
            <form method="POST" action="{{ route('challenge.delete_challenge', ['id' => $viewData['challenge']['id']]) }}">
                @csrf
                @method('DELETE')
                <input type="submit" class="button_form" value="Delete" onclick="return confirm('Are you sure you want to delete this challenge?')" />
            </form>

            <!-- Display Success Message -->
            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
