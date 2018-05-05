<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;

class SocialLoginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::with('Twitter')->redirect();
    }

    public function handleProviderCallback()
    {
        $twitterUser = Socialite::driver('Twitter')->user();

        $user = $this->findOrCreateUser($twitterUser);
        $restaurant = $this->findOrCreateRestaurant($user);
        session(['restaurant' => $restaurant]);

        Auth::login($user, true);

        return redirect()->to('/');
    }

    protected function findOrCreateUser($twitterUser)
    {
        $authUser = User::where('twitter_id', $twitterUser->id)->first();

        if ($authUser) {
            return $authUser;
        }

        // https://github.com/SocialiteProviders/Twitter/blob/master/Provider.php#L20
        return User::create([
            'name' => $twitterUser->nickname,
            'handle' => $twitterUser->name,
            'twitter_id' => $twitterUser->id,
            'avatar' => $twitterUser->avatar,
        ]);
    }

    protected function findOrCreateRestaurant($user)
    {
        $restaurant = Restaurant::where('user_id', $user->id)->first();

        if ($restaurant) {
            return $restaurant;
        }

        // https://github.com/SocialiteProviders/Twitter/blob/master/Provider.php#L20
        return Restaurant::create([
            'user_id' => $user->id,
            'title' => 'レストラン名',
            'description' => '説明文',
            'release_state' => 'private',
        ]);
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->to('/');
    }
}
