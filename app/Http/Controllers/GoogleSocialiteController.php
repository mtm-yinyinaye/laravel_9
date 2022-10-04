<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleSocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        $user = Socialite::driver('google')->user();
        $findUser = User::where('social_id', $user->id)->first();
        if ($findUser) {
            Auth::login($findUser);
            return redirect('/test');
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'social_id' => $user->id,
                'social_type' => 'google',
                'password' => encrypt('123456dummy'),
            ]);
            Auth::login($newUser);
            return redirect('/test');
        }
    }
}
