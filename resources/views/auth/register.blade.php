<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/register/register.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>


        <form class="myForm" method="POST" action="{{ route('register') }}">
        @csrf



        <div class="div emaildiv">
            <label for="">name</label>
    <x-text-input id="name" class="block mt-1 w-full" type="name" name="name" :value="old('name')" required autofocus autocomplete="username" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<div class="div mt-4">
    <label for="Phone">Phone</label>
            <x-text-input id="Phone" class="block mt-1 w-full" type="Phone" name="Phone" :value="old('Phone')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="div emaildiv">
            <label for="">Email</label>
    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"  />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>


        <!-- Password -->
        <div class="div emaildiv mt-4 div">
<label for="">Password</label>
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


      <!-- Confirm Password -->
      <div class="div emaildiv mt-4">
    <label for="">Confirme-Password</label>
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="lay flex items-center justify-end mt-4">
            @if (Route::has('login'))
            <a style="text-align:center" class="already underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            @endif

            <x-primary-button class="register ms-4">
                {{ __('Register') }}
            </x-primary-button>

        </div>

        
        <div class="line"></div>
            

            @if(Route::has('google-auth'))
            <a class="google" href="{{ route ('google-auth')}}">
            <i class='bx bxl-google-plus'></i>
                <span>Continue with Google</span>
            </a>
            @endif
    </form>



</body>
</html>




