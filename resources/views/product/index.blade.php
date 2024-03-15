@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="md:col-span-1 relative">
            <div class="max-w-sm mx-auto bg-white rounded-lg overflow-hidden shadow-md">
                <div class="px-6 py-4">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">Filtrar Productos</h2>
                    <button id="toggleFilterBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Filtrar</button>
                    <div id="filterForm" class="hidden absolute bg-white rounded-lg border border-gray-300 shadow-md py-4 px-6 top-0 left-0 mt-12 z-10">
                        <form action="{{ route('product.index') }}" method="GET">
                            <div class="mb-4">
                                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Categoría:</label>
                                <select name="category" id="category" class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                                    <option value="">Todas las categorías</option>
                                    @foreach ($viewData['categories'] as $category)
                                    <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio:</label>
                                <input type="text" name="price" id="price" class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" placeholder="Ej: 100-500">
                            </div>
                            <div class="mb-4">
                                <label for="brand" class="block text-gray-700 text-sm font-bold mb-2">Marca:</label>
                                <input type="text" name="brand" id="brand" class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" placeholder="Ej: Sony">
                            </div>
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                                <input type="text" name="name" id="name" class="border rounded-md px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" placeholder="Ej: Play 5">
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Filtrar</button>
                                <button type="button" id="closeFilterBtn" class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($viewData['products'] as $product)
        <div class="w-full bg-white border border-gray-200 rounded-lg shadow">
            <a href="{{ route('product.show', ['id' => $product->getId()]) }}">
                <img class="w-full h-48 object-cover rounded-t-lg" src="{{ $product->getImage() }}" alt="product image">
            </a>
            <div class="p-4">
                <a href="{{ route('product.show', ['id' => $product->getId()]) }}" class="text-lg font-semibold text-gray-800">{{ $product->getName() }}</a>
                <div class="flex items-center mt-2">
                    @for ($i = 0; $i < 5; $i++)
                    @if ($i < $product->getRating())
                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0l2.95 6.84 6.02.5c.91.07 1.3 1.18.63 1.79l-4.71 4.5 1.4 6.14c.21 1.02-.87 1.82-1.74 1.33L10 16.24l-5.55 3.52c-.87.49-1.95-.31-1.74-1.33l1.4-6.14-4.71-4.5c-.67-.61-.28-1.72.63-1.79l6.02-.5L10 0z"/>
                    </svg>
                    @else
                    <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0l2.95 6.84 6.02.5c.91.07 1.3 1.18.63 1.79l-4.71 4.5 1.4 6.14c.21 1.02-.87 1.82-1.74 1.33L10 16.24l-5.55 3.52c-.87.49-1.95-.31-1.74-1.33l1.4-6.14-4.71-4.5c-.67-.61-.28-1.72.63-1.79l6.02-.5L10 0z"/>
                    </svg>
                    @endif
                    @endfor
                    <span class="ml-2 text-sm text-gray-600">{{ $product->getRating() }}</span>
                </div>
                <div class="mt-2 flex justify-between items-center">
                    <span class="text-lg font-bold text-gray-800">$ {{ $product->getPrice() }}</span>
                    <form method="POST" action="{{ route('cart.add', ['id' => $product->getId()]) }}">
                        @csrf
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg focus:outline-none focus:shadow-outline">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
