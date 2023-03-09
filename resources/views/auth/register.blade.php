{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('front.leyout.layout')

@push('page_css')
    <link rel="stylesheet" href="{{ asset('front/css/pages/account.css') }}">
@endpush

@section('content')
<!-- Log In start -->
<section class="login">
    <div class="container">
        <div class="account-form">
            <h2 class="text-center">Register Now</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="name" class="form-control" id="name" placeholder="Name">
                    @if ($errors->has('name'))
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                    @if ($errors->has('email'))
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input name="phone" type="number" class="form-control" id="phone" placeholder="Phone">
                    @if ($errors->has('phone'))
                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                    @if ($errors->has('password'))
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password" placeholder="Confirm Password">
                    @if ($errors->has('password_confirmation'))
                    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                    @endif
                </div>
                
                <button type="submit" class="btn btn-primary">Register</button>
                <div class="mt-3">
                    <p class="mb-0 text-center">Alrady have any account? <a href="{{ route('login') }}">Log In</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Log In end -->
@endsection

