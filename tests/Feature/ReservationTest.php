<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReservationTest extends TestCase
{
    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(\App\User::class)->create([
            'name' => 'hoge'
        ]);
    }

    public function testIndex()
    {
        $response = $this->get('/' . $this->user->name);
        $response->assertStatus(200);
    }
}
