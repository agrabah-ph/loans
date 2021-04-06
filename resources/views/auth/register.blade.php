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
                <a href="/login" class="link">Back to homepage</a>
            </div>
            <div class="col-12 col-lg-8 right">
                <div class="content">
                    <h1 class="title">Register</h1>
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
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" placeholder="*****">
                        </div>
                        <div class="form-group">
                            <label for="">Password Confirmation</label>
                            <input type="password" name="password_confirmation" placeholder="*****">
                        </div>
                        <button type="submit" class="btn-submit">Register</button>
                        <a href="/forgot-password" class="link d-flex justify-content-center">Forgot password?</a>
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

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Company name -->
            <div>
                <x-label for="company_name" :value="__('Company Name')" />
                <x-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required autofocus />
            </div>

            <!-- AddressLine -->
            <div>
                <x-label for="address_line" :value="__('Address Line')" />
                <x-input id="address_line" class="block mt-1 w-full" type="text" name="address_line" :value="old('address_line')" required />
            </div>


            <!--First Name -->
            <div>
                <x-label for="fname" :value="__('First Name')" />
                <x-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')" required />
            </div>

            <!--Middle Name -->
            <div>
                <x-label for="mname" :value="__('Middle Name')" />
                <x-input id="mname" class="block mt-1 w-full" type="text" name="mname" :value="old('mname')" required />
            </div>


            <!--Last Name -->
            <div>
                <x-label for="lname" :value="__('Last Name')" />
                <x-input id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')" required />
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password"  name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
--}}
