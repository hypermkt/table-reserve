<?php

namespace Tests\Feature\Auth;

use Laravel\Socialite\Facades\Socialite;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SocialLoginTest extends TestCase
{
    public function testCallback()
    {
        $user = new \stdClass();
        $user->id = 1;
        $user->nickname = 'hoge';
        $user->name = 'fuga';
        $user->avatar = 'bar';

        // refs: http://docs.mockery.io/en/latest/reference/demeter_chains.html
        Socialite::shouldReceive('driver->user')
            ->andReturn($user);

        $response = $this->get('/auth/twitter/callback');

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}
