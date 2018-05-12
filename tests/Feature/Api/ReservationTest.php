<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\DataAccess\Eloquent\User;
use App\DataAccess\Eloquent\TableType;
use App\DataAccess\Eloquent\Restaurant;
use App\DataAccess\Eloquent\Course;

class ReservationTest extends TestCase
{
    use DatabaseTransactions;

    protected $course;
    protected $restaurant;

    public function setUp()
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $this->restaurant = factory(Restaurant::class)->create([
            'user_id' => $user->id
        ]);
        $tableType = factory(TableType::class)->create([
            'restaurant_id' => $this->restaurant->id,
            'user_id' => $user->id
        ]);
        $this->course = factory(Course::class)->create([
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
