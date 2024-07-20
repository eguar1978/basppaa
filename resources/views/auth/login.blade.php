@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="w-full max-w-md mx-auto bg-white p-8 border border-gray-300 rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="email" class="border border-gray-300 p-2 w-full @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input id="password" type="password" class="border border-gray-300 p-2 w-full @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="ml-2 text-gray-700">Remember Me</span>
                </label>
            </div>

            <div>
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg">Login</button>
            </div>

            @if (Route::has('password.request'))
                <div class="mt-4 text-center">
                    <a class="text-blue-500 hover:underline" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
