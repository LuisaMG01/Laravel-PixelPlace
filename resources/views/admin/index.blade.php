@extends('layouts.admin')

@section('content')
    <h3 class="text-3xl font-bold dark:text-white">Welcome {{ auth()->user()->getName() }} !</h3>
    <br>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4">
        <div
            class="card color-pastel flex flex-col justify-between p-6  bg-blue-100 border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Orders</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Total Orders: {{ $viewData['orderCount'] }}</p>
        </div>

        <div
            class="card color-pastel flex flex-col justify-between p-6 bg-blue-300 border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Users</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Total Users: {{ $viewData['userCount'] }}</p>
        </div>

        <div
            class="card color-pastel flex flex-col justify-between p-6 bg-blue-400 border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Products</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Total Products: {{ $viewData['productCount'] }}</p>
        </div>

    </div>

    <br>
    <br>

    <div class="w-full  flex justify-center items-center">
        <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between">
                <div>
                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">See your Sales !</h5>
                    <br>
                </div>
            </div>
            <div id="area-chart"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('chart')
    <script>
        const chartData = @json($viewData['chartData']);
    </script>
@endsection
