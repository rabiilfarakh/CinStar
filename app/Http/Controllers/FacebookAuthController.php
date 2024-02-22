<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class FacebookAuthController extends Controller
{
    public function redirect() {
        return Socialite::driver('facebook')->redirect();
    }


    public function callbackFacebook() {
        $facebook_user = Socialite::driver('facebook')->user();

        $user = User::where('facebook_id' , $facebook_user->getId())->first();

        if(!$user) {

            $newuser = User::create([
                'name' => $facebook_user->getName(),
                'email' => $facebook_user->getEmail(),
                'facebook_id' => $facebook_user->getId(),
            ]); 

            Session::put('user_role', $newuser->id);

            return redirect()->route('role');
        }
        else {
            Auth::login($user);
            return redirect('/');
        }
    }

}
