<?php

namespace Tests\Feature\Api\V1;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\DataAccess\Eloquent\User;
use App\DataAccess\Eloquent\Restaurant;
use App\DataAccess\Eloquent\TableType;
use App\DataAccess\Eloquent\Course;

class CourseTest extends TestCase
{
    use DatabaseTransactions;

    protected $user;
    protected $course;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $restaurant = factory(Restaurant::class)->create([
            'user_id' => $this->user->id
        ]);
        $tableType = factory(TableType::class)->create([
            'restaurant_id' => $restaurant->id,
            'user_id' => $this->user->id
        ]);
        $this->course = factory(Course::class)->create([
            'user_id' => $this->user->id
        ]);
        $this->course->tableTypes()->attach([$tableType->id]);
    }

    public function testIndex()
    {
        $response = $this->get('/api/v1/courses?username=' . $this->user->name);
        $response->assertStatus(200);
    }
}
