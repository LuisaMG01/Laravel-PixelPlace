@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $viewData['challenge']->getName() }}
                    </h5>
                    <h6 class="card-text"><strong>{{ $viewData['challenge']->getDescription() }}</strong></h6>
                    <div class="d-flex text-center">
                        <h6 class="ml-3"><strong>Name: </strong>{{ $viewData['challenge']->getName() }}</h6>
                    </div>
                    <div class="d-flex text-center">
                        <h6 class="ml-3"><strong>Checked: </strong>{{ $viewData['challenge']->checked ? 'True' : 'False' }}</h6>
                    </div>
                    <div class="d-flex text-center">
                        <h6 class="ml-3"><strong>Reward Coins: </strong>{{ $viewData['challenge']->getRewardCoins() }}</h6>
                    </div>
                    <div class="d-flex text-center">
                        <h6 class="ml-3"><strong>Max Users: </strong>{{ $viewData['challenge']->getMaxUsers() }}</h6>
                    </div>
                    <div class="d-flex text-center">
                        <h6 class="ml-3"><strong>Current Users: </strong>{{ $viewData['challenge']->getCurrentUsers() }}</h6>
                    </div>
                    <div class="d-flex text-center">
                        <h6 class="ml-3"><strong>Category: </strong>{{ $viewData['challenge']->category->name }}</h6>
                    </div>
                    <div class="d-flex text-center">
                        <h6 class="ml-3"><strong>Category Quantity: </strong>{{ $viewData['challenge']->getCategoryQuantity() }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <form action="" method="POST">
            @csrf
            <form method="POST" action="{{ route('challenge.destroy', ['id' => $viewData['challenge']->getId()]) }}">
                @csrf
                @method('DELETE')
                <input type="submit" class="button_form" value="Delete" onclick="return confirm('Are you sure you want to delete this challenge?')" />
            </form>
        </form>

            <a  href = {{route('challenge.edit' , ['id' => $viewData['challenge'] -> getId()])}} type="submit" class="btn btn-primary">Edit</a>
        
    </div>
@endsection
