@extends('layouts.master-client')

@section('title')
    Register | Agrabah
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
                    <h1 class="title">Forgot Password</h1>
                    <div class="validator-container">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    </div>

                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" placeholder="yourname@domain.com">
                        </div>

                        <button type="submit" class="btn-submit">Email password reset link</button>
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

{{--
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
--}}
