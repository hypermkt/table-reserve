<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReservationTest extends TestCase
{
    protected $page;
    protected $baseUrl;

    public function setUp()
    {
        // MEMO: Laravelで独自のsetUpを呼ぶ場合は、parent::setUpの呼び出しが必要
        // refs: https://readouble.com/laravel/5.6/ja/testing.html
        parent::setUp();
        $user = factory(\App\User::class)->create();
        $this->page = factory(\App\Restaurant::class)->create([
            'user_id' => $user->id
        ]);
        $this->baseUrl = $user->name . '/' . $this->page->id;
        $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->get($this->baseUrl);
        $response->assertstatus(200);
    }

    public function testShow()
    {
        $response = $this->get($this->baseUrl . '/courses/1');
        $response->assertstatus(200);
    }
}
