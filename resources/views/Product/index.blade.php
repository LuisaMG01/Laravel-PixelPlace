@extends('layouts.header')
@section('content')
<div class="row">
  @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
  @endif
  @foreach ($viewData["products"] as $product)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">
        <p> {{ $product-> getName() }} </p>
        <a href="{{ route('product.show', ['id'=> $product-> getId()]) }}"
          class="btn bg-primary text-white">{{ $product-> getId() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection