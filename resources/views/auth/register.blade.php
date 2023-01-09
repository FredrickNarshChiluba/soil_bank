@extends('site.app')
@section('content')
  <x-guest-layout>
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Register</h2>
        </div>
    </section>
        <x-auth-card>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />

                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Contact  Mobile -->
                <div class="mt-4">
                    <x-input-label for="Phone" :value="__('Phone')" />

                    <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" placeholder="Type here" required />
                </div>

                <!-- Contact Address -->
                <div class="mt-4">
                    <x-input-label for="Address" :value="__('Address')" />

                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('Address')" required/>
                </div>

                <!-- Your  photo -->
                <div class="mt-4">
                    <label> Your Photo </label>

                    <input type="file"  class="block mt-1 w-full" name="thumbnail" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>



                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
                </form>
            </div>
        </x-auth-card>

    
  </x-guest-layout>
@stop