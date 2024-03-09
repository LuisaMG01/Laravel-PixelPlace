@extends('layouts.app')

@section('content')
    <section class="flex items-center justify-center min-h-screen mt-16">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg px-8 py-6">
                <h1 class="text-2xl font-bold mb-6 text-center">Sign in to your account</h1>
                <form class="space-y-4" action="{{ route('login') }}" method="POST">
                    @csrf
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
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-600 focus:border-primary-600 @error('email') border-red-500 @enderror">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <input name="remember" id="remember" aria-describedby="remember" type="checkbox"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="ml-2 text-sm text-gray-500">Remember me</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-sm font-medium text-primary-600 hover:underline">Forgot password?</a>
                        @endif
                    </div>
                    <button type="submit"
                        class="w-full bg-primary-600 text-blue rounded-lg py-2.5 text-sm hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300">Sign
                        in</button>
                    <p class="text-sm text-gray-500 mt-4">Don’t have an account yet? <a href="{{ route('register') }}"
                            class="font-medium text-primary-600 hover:underline">Sign up</a></p>
                </form>
            </div>
        </div>
    </section>
@endsection
