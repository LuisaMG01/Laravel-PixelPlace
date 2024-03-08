@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Available products</h1>
            <ul>
                @foreach($viewData['products'] as $product)
                    <li>
                        Id: {{ $product->getId() }} - 
                        Name: {{ $product->getName() }} -
                        Price: {{ $product->getPrice() }} -
                        <form method="POST" action="{{ route('cart.add', ['id'=> $product->getId()]) }}">
                            @csrf
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <div class="input-group-text">Quantity</div>
                                        <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn bg-primary text-white" type="submit">Add to cart</button>
                                </div>
                            </div>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Products in cart</h1>
            <ul>
                @foreach($viewData['cartProducts'] as $product)
                    <li>
                        Id: {{ $product->getId() }} - 
                        Name: {{ $product->getName() }} -
                        Price: {{ $product->getPrice() }}
                        <a href="{{ route('cart.removeItem', ['id'=> $product->getId()]) }}">Remove item from the cart</a>
                    </li>
                @endforeach
            </ul>
            <form method="POST" action="{{ route('cart.destroy') }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete cart</button>
            </form>
            <a href="{{ route('order.purchase') }}">Generate Order</a>
        </div>
    </div>
</div>
@endsection
