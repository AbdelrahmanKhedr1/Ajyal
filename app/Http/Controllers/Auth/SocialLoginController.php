<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function  redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|void
     */
    public function callback( $provider)
    {

        $provider_user = Socialite::driver($provider)->user();

        // check if they're an existing user
        $existingUser = User::where('email', $provider_user->getEmail())->first();
        if ($existingUser) {
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user instance and save it
            $user = User::create([
                'name' => $provider_user->getName(),
                'email' => $provider_user->getEmail(),
                'password' => bcrypt('12345678'),
                'provider_id'  => $provider_user->getId(),
                'provider'  => $provider,
                'provider_token'  => $provider_user->token,
            ]);


            // login the new user
            auth()->login($user, true);
        }

        // send back to the previous page or dashboard
        return redirect()->to('/');
    }
}
