<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body>

    <x-guest-layout>
        <div class="form-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
                        autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" />
                </div>

                <!-- Referral Code -->
                <div>
                    <x-input-label for="referral_code" :value="__('Referral Code')" />
                    <x-text-input id="referral_code" type="text" name="referral_code" :value="old('referral_code')" />
                    <x-input-error :messages="$errors->get('referral_code')" />
                </div>

                <div>
                    <a href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                    <button>{{ __('Register') }}</button>
                </div>
            </form>
        </div>
    </x-guest-layout>

</body>

</html>
