@extends('layouts.master-client')

@section('title')
    Reset Password | Agrabah
@endsection

@include('client.partials.stacks')

@section('content')
    <main class="page-forms">
        <div class="row no-gutters sign-in">
            <div class="col-12 col-lg-4 left">
                @stack('left-pane')
                <a href="/login" class="link">Return to login</a>
            </div>
            <div class="col-12 col-lg-8 right">
                <div class="content">
                    <h1 class="title">Reset Password</h1>
                    <small>
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </small>
                    <div class="validator-container">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    </div>

                    <form method="POST" action="{{route('password.update')}}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="form-group d-none">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{old('email', $request->email)}}" placeholder="yourname@domain.com" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="password_confirmation" placeholder="Confirm password">
                        </div>
                        <button type="submit" class="btn-submit">Reset Password</button>
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

        form {
            margin-top: 0;
        }
    </style>
@endsection

@section('scripts')
    <script>
    </script>
@endsection

{{--
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
--}}
