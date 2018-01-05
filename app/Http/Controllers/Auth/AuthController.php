<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SocialProvider;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
    * Redirect the user to the OAuth Provider.
    *
    * @return Response
    */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $userProvided = Socialite::driver($provider)->user();
        // dd($userProvided->getId());
        $user = $this->findOrCreateUser($userProvided, $provider);
        auth()->login($user);
        return redirect()->intended('/home');
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($userProvided, $provider)
    {
        $socialProvider = SocialProvider::where('provider_id', $userProvided->getId())
                                    ->where('provider', $provider)
                                    ->first();
        if ($socialProvider) {
            return $socialProvider->user;
        }
        $account = new SocialProvider([
            'provider_id' => $userProvided->getId(),
            'provider' => $provider
        ]);
        $user = User::whereEmail($userProvided->getEmail())->first();
        if (!$user) {
            $user = User::create([
                'name'     => $userProvided->getName(),
                'email'    => $userProvided->getEmail(),
            ]);
        }
        $account->user()->associate($user);
        $account->save();
        return $user;
    }
}
