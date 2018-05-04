<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StockTest extends TestCase
{
    protected $page;
    protected $baseUrl;

    public function setUp()
    {
        parent::setUp();
        $user = factory(\App\User::class)->create();
        $this->page = factory(\App\Page::class)->create([
            'user_id' => $user->id
        ]);
        $this->baseUrl = '/pages/' . $this->page->id . '/stocks';
        $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->get($this->baseUrl);
        $response->assertStatus(200);
    }

}
