<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth\SocialLogin\CallbackService;

class SocialLoginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::with('Twitter')->redirect();
    }

    public function handleProviderCallback(CallbackService $service)
    {
        Auth::login($service->execute(), true);

        return redirect()->to('/');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->to('/');
    }
}
