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


    <div class="flex flex-1 pt-16">
        @include('partials.admin.adminSidebar')
    </div>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            @yield('content')
        </div>
    </div>

    @yield('chart')



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('js/area-chart.js') }}"></script>
    <script src="{{ asset('js/asidebar.js') }}"></script>
</body>



</html>
