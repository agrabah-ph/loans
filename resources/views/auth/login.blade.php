@extends('layouts.master-client')

@section('title')
    Login | Agrabah
@endsection

@include('client.partials.stacks')

@section('content')
    <main class="page-forms">
        <div class="row no-gutters sign-in">
            <div class="col-12 col-lg-4 left">
                @stack('left-pane')
                <a href="" class="link">Back to homepage</a>
            </div>
            <div class="col-12 col-lg-8 right">
                <div class="content">
                    <h1 class="title">Login</h1>
                    <small>Log on using your login and password or use social media login to enter</small>
                    <div class="validator-container">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    </div>

                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="">Please type your email address</label>
                            <input type="email" name="email" placeholder="yourname@domain.com">
                        </div>
                        <div class="form-group">
                            <label for="">and your password</label>
                            <input type="password" name="password" placeholder="*****">
                        </div>

                        <div class="line"><small>or</small></div>

                        <small class="d-flex justify-content-center">Log in with</small>

                        <div class="social-container">
                            <a href=""><img src="{{asset('images/icon-google.png')}}" alt="icon-google"></a>
                            <a href="{{ route('social.oauth', 'facebook') }}"><img src="{{asset('images/icon-facebook.png')}}" alt="icon-facebook"></a>
                            <a href=""><img src="{{asset('images/icon-twitter.png')}}" alt="icon-twitter"></a>
                        </div>

                        <button type="submit" class="btn-submit">Login</button>

                        <a href="/forgot-password" class="link d-flex justify-content-center">Forgot password?</a>

                        <div class="register-text text-center">Not registered yet? <a href="/register">Sign up</a> now!</div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('styles')
    <style>
        .validator-container {
            margin-top: 30px;
        }
    </style>
@endsection

@section('scripts')
    <script>
    </script>
@endsection
{{--<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>--}}
