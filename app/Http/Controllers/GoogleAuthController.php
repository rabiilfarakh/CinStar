<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class GoogleAuthController extends Controller
{
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle() {
try { 
            $google_user = Socialite::driver('google')->user();


            $user = User::where('google_id' , $google_user->getId())->first();

            if(!$user) {

                $newuser = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]); 

                Session::put('user_role', $newuser->id);

                return redirect()->route('role');
            }
            else {
                Auth::login($user);
                return redirect('/');
            }

        }
            catch (\Exception $e) {
                // Handle any exceptions, such as Socialite or database errors
                throw ValidationException::withMessages(['error' => 'Authentication failed. Please try again.']);
            }


    }
}
