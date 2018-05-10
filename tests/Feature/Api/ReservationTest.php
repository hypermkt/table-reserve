<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use DatabaseMigrations;

    protected $course;
    protected $restaurant;

    public function setUp()
    {
        parent::setUp();
        $user = factory(\App\User::class)->create();
        $this->restaurant = factory(\App\Restaurant::class)->create([
            'user_id' => $user->id
        ]);
        $tableType = factory(\App\TableType::class)->create([
            'restaurant_id' => $this->restaurant->id,
            'user_id' => $user->id
        ]);
        $this->course = factory(\App\Course::class)->create([
            'user_id' => $user->id
        ]);
        $this->course->tableTypes()->attach([$tableType->id]);
    }

    public function testStore()
    {
        $response = $this->post('/api/reservations', [
            'name' => 'hpge',
            'email' => 'hpge@example.com',
            'tel' => '03-1234-5678',
            'restaurant_id' => $this->restaurant->id,
            'course_id' => $this->course->id,
            'number_of_people' => 2,
            'datetime' => '2018-05-01 12:00',
        ]);

        $response->assertStatus(201);
    }
}
