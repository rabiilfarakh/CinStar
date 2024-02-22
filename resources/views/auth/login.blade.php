@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/register/login.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>CineStar | Login</title>
</head>
<body>


<form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="inpt block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="inpt block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        </div>

        <div class="lay flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="login ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="line"></div>

        @if(Route::has('google-auth'))
            <a class="google" href="{{ route ('google-auth')}}">
            <i class='bx bxl-google-plus'></i>
                <span>Continue with Google</span>
            </a>
            @endif

            @if(Route::has('facebook-auth'))
            <a class="facebook" href="{{ route ('facebook-auth')}}">
            <ion-icon name="logo-facebook"></ion-icon>
                <span>Continue with Facebook</span>
            </a>
            @endif


            <a href="{{route('register')}}">Already have an account !</a>
    </form>


   


    
    
</body>
</html>