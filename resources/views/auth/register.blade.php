@extends('layouts.app')

@section('content')
    <section class="flex items-center justify-center min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-lg shadow-md p-6 md:p-8">
                <h1 class="text-2xl font-bold mb-6 text-center">Create an account</h1>
                <form class="space-y-4" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Your name</label>
                        <input type="text" name="name" id="name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-600 focus:border-primary-600
                                      @error('name') border-red-500 @enderror"
                            placeholder="nickname" value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                        <input type="email" name="email" id="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-600 focus:border-primary-600
                                      @error('email') border-red-500 @enderror"
                            placeholder="name@company.com" value="{{ old('email') }}" autocomplete="email" autofocus>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-600 focus:border-primary-600 @error('password') border-red-500 @enderror">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                            password</label>
                        <input type="password" name="password_confirmation" id="confirm-password" placeholder="••••••••"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-600 focus:border-primary-600 @error('confirm-password') border-red-500 @enderror">
                        @error('confirm-password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full bg-primary-600 text-blue rounded-lg py-2.5 text-sm hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300">
                        Create an account
                    </button>
                    <p class="text-sm font-light text-gray-500">Already have an account?
                        <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline">Login
                            here</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
@endsection
