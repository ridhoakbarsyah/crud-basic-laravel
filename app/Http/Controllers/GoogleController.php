<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function HandleGoogleCallback($newUser)
    {
        try {
            $user = Socialite::driver('google')->user();

            $findUser = User::where('id_google', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended('sesi');
            } else {
                $findUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'id_google' => $user->id,
                    'email_verified_at' => date('D-m-y H:i:s', time())
                ]);

                Auth::login($newUser);
                return redirect()->intended('sesi');
            }
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }
}
