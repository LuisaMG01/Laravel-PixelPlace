@extends('layouts.app')
@section('content')

    <section class="text-gray-700 body-font overflow-hidden bg-white">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0 order-2 lg:order-1">
                    <img alt="ecommerce"
                        class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200 mb-6 lg:mb-0"
                        src="{{ URL::asset('storage/'.$viewData['product']->getName().'.png') }}">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $viewData['product']->getBrand() }}</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $viewData['product']->getName() }}</h1>
                    <p class="leading-relaxed">Categoría: {{ $viewData['product']->category->getName() }}</p>
                    <p class="leading-relaxed">Descripción: {{ $viewData['product']->getDescription() }}</p>
                    <p class="leading-relaxed">Palabras Clave:
                        @foreach ($viewData['product']->getKeywords() as $keyword)
                            {{ $keyword }}.
                        @endforeach
                    </p>
                    <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                        <span
                            class="title-font font-medium text-2xl text-gray-900">${{ $viewData['product']->getPrice() }}</span>
                    </div>
                    <div class="flex">
                        @auth
                            <div class="btn-container mr-8">
                                <a href="{{ route('reviews.create', ['id' => $viewData['product']->getId()]) }}"
                                    class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Comentar</a>
                            </div>
                        @endauth
                        <div class="btn-container">
                            <a href="{{ route('reviews.show', ['id' => $viewData['product']->getId()]) }}"
                                class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Ver
                                Comentarios</a>
                        </div>
                        <form method="POST" action="{{ route('cart.add', ['id' => $viewData['product']->getId()]) }}">
                            @csrf
                            <button type="submit" class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded">
                              Add to cart
                            </button>
                        </form>
                    </div>
                </div>
                <div class="lg:w-1/2 w-full order-1 lg:order-2">
                </div>
            </div>
        </div>
    </section>
@endsection
