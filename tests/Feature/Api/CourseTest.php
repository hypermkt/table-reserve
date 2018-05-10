<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use DatabaseMigrations;

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
        $response = $this->get('/api/courses?username=' . $this->user->name);
        $response->assertStatus(200);
    }
}
