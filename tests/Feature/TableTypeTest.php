<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TableTypeTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->get('/table_types');
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this->get('/table_types/create');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $response = $this->post('/table_types', [
            'release_state' => 'public',
            'title' => 'hoge',
            'start_time' => '10:00',
            'end_time' => '19:00',
            'minimum_capacity' => 1,
            'max_capacity' => 4,
            'number_of_sales' => 3,
            'connectable' => 0,
        ]);
        $response->assertRedirect('/table_types');
    }
}
