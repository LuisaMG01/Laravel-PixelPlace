@extends('layouts.header')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["product"]-> getName() }}
        </h5>
        <p class="card-text"> Descripción : {{ $viewData["product"]-> getDescription() }}</p>
        <p class="card-text"> Imagen : {{ $viewData["product"]-> getImage() }}</p>
        <p class="card-text"> Marca : {{ $viewData["product"]-> getBrand() }}</p>
        <p class="card-text"> Palabras Clave:
            @foreach($viewData["product"]->getKeywords() as $keyword)
                {{ $keyword }}.
            @endforeach
        </p>    
        <p class="card-text"> Precio : {{ $viewData["product"]-> getPrice() }}</p>
        <p class="card-text"> Stock : {{ $viewData["product"]-> getStock() }}</p>
        <p class="card-text"> Categoria : {{ $viewData["category"]->getName() }}</p>
      </div>
    </div>
  </div>
</div>
<div class="card">
    <form action="" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Borrar</button>
    </form>
    <div class="btn-container">
      <a href="{{ route('product.edit', ['id'=> $viewData['product']->getId()]) }}" class="btn btn-primary">Editar</a>
    </div>
    <div class="btn-container">
      <a href="{{ route('review.create', ['id'=> $viewData['product']->getId()]) }}" class="btn btn-primary">Comentar</a>
    </div>
    <div class="btn-container">
      <a href="{{ route('review.show', ['id'=> $viewData['product']->getId()]) }}" class="btn btn-primary">Ver Comentarios</a>
    </div>
</div>
@endsection


