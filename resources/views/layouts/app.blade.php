<!DOCTYPE html>
<html lang="en" class='light'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('icons/ghost.png') }}" type="image/x-icon" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="{{ asset('css/review.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/challenge.css') }}" rel="stylesheet" />

</head>

<body>
    @include('partials/navbar')
    <div class="container mx-auto">
        @yield('content')

    </div>
    @include('partials/footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/review.js') }}"></script>
    <script src="{{ asset('js/filters.js') }}"></script>
    <script src="{{ asset('js/challenge.js') }}"></script>
</body>

</html>
