<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\DataAccess\Eloquent\User;
use App\DataAccess\Eloquent\Restaurant;
use App\DataAccess\Eloquent\TableType;

class CourseTest extends TestCase
{
    use DatabaseTransactions;

    protected $tableType;

    public function setUp()
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $restaurant = factory(Restaurant::class)->create([
            'user_id' => $user->id,
        ]);
        $this->tableType = factory(TableType::class)->create([
            'restaurant_id' => $restaurant->id,
            'user_id' => $user->id,
        ]);
        $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->get('/courses');
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this->get('/courses/create');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $response = $this->post('/courses', [
            'table_types' => [$this->tableType->id],
            'release_state' => 'public',
            'kind' => 'course_menu',
            'course_name' => 'hoge',
            'price' => 1000,
            'duration_minutes' => 60,
        ]);

        $response->assertRedirect('/courses');
    }
}
