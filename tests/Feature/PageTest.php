<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    public function setUp()
    {
        // MEMO: Laravelで独自のsetUpを呼ぶ場合は、parent::setUpの呼び出しが必要
        // refs: https://readouble.com/laravel/5.6/ja/testing.html
        parent::setUp();
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->get('/pages');
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this->get('/pages/create');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $response = $this->post('/pages', [
            'release_state' => 'public',
            'title' => 'hoge',
            'description' => 'hoge',
        ]);
        $response->assertRedirect('/pages');
    }
}
