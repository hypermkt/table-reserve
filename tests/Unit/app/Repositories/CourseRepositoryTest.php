<?php

namespace Test\Unit\App\Repositories;

use App\Repositories\CourseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\DataAccess\Eloquent\User;
use App\DataAccess\Eloquent\Restaurant;
use App\DataAccess\Eloquent\TableType;
use App\DataAccess\Eloquent\Course;
use Tests\TestCase;

class CourseRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    private $user;
    private $restaurant;
    private $tableType;
    private $repository;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->restaurant = factory(Restaurant::class)->create([
            'user_id' => $this->user->id
        ]);
        $this->tableType = factory(TableType::class)->create([
            'restaurant_id' => $this->restaurant->id,
            'user_id' => $this->user->id,
        ]);
        $this->repository = new CourseRepository();
    }

    /**
     * @test
     */
    public function store()
    {
        $data = [
            'release_state' => 'public',
            'kind' => 'course_menu',
            'course_name' => 'hoge',
            'price' => 1000,
            'duration_minutes' => 60,
        ];
        $tableTypes = ['table_types' =>
            [
                $this->tableType->id
            ]
        ];
        $course = $this->repository->store(array_merge($data, $tableTypes), $this->user->id);

        $this->assertDatabaseHas('courses', array_merge(
            ['user_id' => $this->user->id],
            $data
        ));
        $this->assertDatabaseHas('course_table_type', [
            'course_id' => $course->id,
            'table_type_id' => $this->tableType->id
        ]);
    }

    /**
     * @test
     */
    public function update()
    {
        $course = factory(Course::class)->create([
            'user_id' => $this->user->id
        ]);
        $data = [
            'release_state' => 'private',
            'kind' => 'only_table',
            'course_name' => 'hoge',
            'price' => 1000,
            'duration_minutes' => 60,
        ];
        $tableTypes = ['table_types' =>
            [
                $this->tableType->id
            ]
        ];
        $this->repository->update(array_merge($data, $tableTypes), $course);

        $this->assertDatabaseHas('courses', array_merge(
            ['user_id' => $this->user->id],
            $data
        ));
        $this->assertDatabaseHas('course_table_type', [
            'course_id' => $course->id,
            'table_type_id' => $this->tableType->id
        ]);
    }
}
