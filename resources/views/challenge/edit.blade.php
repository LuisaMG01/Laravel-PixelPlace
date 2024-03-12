@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('challenge.update', ['id' => $viewData['challenge']->getId()]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $viewData['challenge']->getName() }}">
        </div>

        <div class="form-group">
            <label for="checked">Checked:</label>
            <input type="checkbox" name="checked" id="checked" class="form-control" {{ $viewData['challenge']->getChecked() ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="reward_coins">Reward coins:</label>
            <input type="text" name="reward_coins" id="reward_coins" class="form-control" value="{{ $viewData['challenge']->getRewardCoins() }}">
        </div>

        <div class="form-group">
            <label for="max_users">Maximun amount of users:</label>
            <input type="text" name="max_users" id="max_users" class="form-control" value="{{ $viewData['challenge']->getMaxUsers() }}">
        </div>

        <div class="form-group">
            <label for="current_users">Current amount of users:</label>
            <input type="text" name="current_users" id="current_users" class="form-control" value="{{ $viewData['challenge']->getCurrentUsers() }}">
        </div> 
        
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ $viewData['challenge']->getDescription() }}">
        </div> 

        <div class="mb-3">
            <label for="expiration_date" class="form-label">Expiration Date:</label>
            <input type="date" class="form-control" id="expiration_date" name="expiration_date" required>
        </div>

        <div class="form-group">
            <label for="category_quantity">Category quantity:</label>
            <input type="number" name="category_quantity" id="category_quantity" class="form-control" value="{{ $viewData['challenge']->getCategoryQuantity() }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Desafío</button>
    </form>
@endsection
