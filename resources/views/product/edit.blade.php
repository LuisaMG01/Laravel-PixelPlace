@extends('layouts.header')
@section('content')
<form method="POST" action="{{ route('product.update', ['id'=> $viewData['product']-> getId()]) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $viewData['product']->getName() }}">
    </div>

    <div class="form-group">
        <label for="image">Imagen:</label>
        <input type="text" name="image" id="image" class="form-control" value="{{ $viewData['product']->getImage() }}">
    </div>

    <div class="form-group">
        <label for="brand">Marca:</label>
        <input type="text" name="brand" id="brand" class="form-control" value="{{ $viewData['product']->getBrand() }}">
    </div>

    <div class="form-group">
        <label for="keywords">Palabras Clave:</label>
        <input type="text" name="keywords" id="keywords" class="form-control" value="{{ implode(', ', $viewData['product']->getKeywords()) }}">
    </div>

    <div class="form-group">
        <label for="price">Precio:</label>
        <input type="number" name="price" id="price" class="form-control" value="{{ $viewData['product']->getPrice() }}">
    </div>

    <div class="form-group">
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" class="form-control" value="{{ $viewData['product']->getStock() }}">
    </div>

    <div class="form-group">
        <label for="description">Descripción:</label>
        <textarea name="description" id="description" class="form-control">{{ $viewData['product']->getDescription() }}</textarea>
    </div>

    <div class="form-group">
        <label for="category_id">Categoría:</label>
            <select name="category_id" id="category_id" class="form-control mb-2">
                @foreach($viewData['categories'] as $category)
                    <option value="{{ $category->getId() }}" {{ $category->getId() == $viewData['product']->getCategoryId() ? 'selected' : '' }}>
                        {{ $category->getName() }}
                    </option>
                @endforeach
            </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
</form>
@endsection
