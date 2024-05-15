<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link rel="icon" href="{{ asset('icons/ghost.png') }}" type="image/x-icon" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen">
    @include('partials.admin.adminNavbar')

    <div class="flex flex-col md:flex-row flex-1">
        <aside class="md:w-64 md:flex-shrink-0">
            @include('partials.admin.adminSidebar')
        </aside>
        <main class="flex-1 pt-16 px-6">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-screen-lg mx-auto">
                @yield('content')
            </div>
        </main>
    </div>

    @yield('chart')



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('js/area-chart.js') }}"></script>
</body>



</html>
