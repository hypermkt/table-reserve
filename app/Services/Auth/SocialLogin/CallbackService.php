<?php

namespace App\Services\Auth\SocialLogin;

use App\DataAccess\Eloquent\User;
use App\DataAccess\Eloquent\Restaurant;
use Laravel\Socialite\Facades\Socialite;

class CallbackService
{
    public function execute()
    {
        $twitterUser = Socialite::driver('Twitter')->user();

        $user = $this->findOrCreateUser($twitterUser);
        $restaurant = $this->findOrCreateRestaurant($user);
        session(['restaurant_id' => $restaurant->id]);

        return $user;
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
}
