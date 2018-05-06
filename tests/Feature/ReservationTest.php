<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReservationTest extends TestCase
{
    protected $user;
    protected $course;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(\App\User::class)->create();
        $restaurant = factory(\App\Restaurant::class)->create([
            'user_id' => $this->user->id
        ]);
        $tableType = factory(\App\TableType::class)->create([
            'restaurant_id' => $restaurant->id,
            'user_id' => $this->user->id
        ]);
        $this->course = factory(\App\Course::class)->create([
            'user_id' => $this->user->id
        ]);
        $this->course->tableTypes()->attach([$tableType->id]);
    }

    public function testIndex()
    {
        $response = $this->get($this->user->name);
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $response = $this->get('/' . $this->user->name . '/' . $this->course->id);
        $response->assertStatus(200);
    }
}
