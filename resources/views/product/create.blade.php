@extends('layouts.header')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Crear producto</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('product.store') }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Nombre producto" name="name" value="{{ old('name') }}" />
              <input type="text" class="form-control mb-2" placeholder="URL Imagen" name="image" value="{{ old('image') }}" />
              <input type="text" class="form-control mb-2" placeholder="Marca" name="brand" value="{{ old('brand') }}" />
              <input type="text" class="form-control mb-2" placeholder="Palabras Clave (separadas por coma)" name="keywords" value="{{ old('keywords') }}" />
              <input type="int" class="form-control mb-2" placeholder="Precio" name="price" value="{{ old('price') }}" />
              <input type="int" class="form-control mb-2" placeholder="Stock" name="stock" value="{{ old('stock') }}" />
              <input type="text" class="form-control mb-2" placeholder="Descripción" name="description" value="{{ old('description') }}" />
              <input type="submit" class="btn btn-primary" value="Crear" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection