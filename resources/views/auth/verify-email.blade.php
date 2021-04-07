@extends('layouts.master-client')

@section('title')
    Verify | Agrabah
@endsection

@include('client.partials.stacks')

@section('content')
    <main class="page-forms">
        <div class="row no-gutters sign-in">
            <div class="col-12 col-lg-4 left">
                @stack('left-pane')
            </div>
            <div class="col-12 col-lg-8 right">
                <div class="content">
                    <h1 class="title">Verify </h1>
                    <small>
                        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                    </small>
                    <form method="POST" action="{{route('verification.send')}}">
                        @csrf
                        <button type="submit" class="btn-submit">Resend verification email</button>
                    </form>

                    <div class="validator-container">
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600 text-center">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('logout') }}" style="text-align: center;">
                        @csrf
                        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Logout
                        </button>
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
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
--}}
