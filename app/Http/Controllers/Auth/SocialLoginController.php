<?php

namespace App\Http\Controllers\Auth;

use App\User;
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

        Auth::login($user, true);

        return redirect()->to('/pages');
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

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}
