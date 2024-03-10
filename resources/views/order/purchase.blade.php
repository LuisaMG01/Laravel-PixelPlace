@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="card">
    <div class="card-header">
        Purchase Completed
    </div>
    <div class="card-body">
        <div class="alert alert-success" role="alert">
            Congratulations, purchase completed. Order number is <b>#{{ $viewData['order']->getId() }}</b>
        </div>
        <h5 class="card-title">Order summary</h5>
        <p class="card-text"><b>Order ID: {{ $viewData['order']->getId() }}</b></p>
        <p class="card-text"><b>Total: {{ $viewData['order']->getTotalCoins() }}</b></p>
        <p class="card-text">
            @foreach($viewData['items'] as $item)
                <ul>
                    <li><b>Product name: </b>{{ $item->product->getName() }} x {{ $item->getAmount() }} x {{ $item->getAcquirePriceCoins() }}</li>
                </ul>
            @endforeach
        </p>
    </div>
</div>
@endsection