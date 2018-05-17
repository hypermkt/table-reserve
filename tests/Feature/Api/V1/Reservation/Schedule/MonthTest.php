<?php

namespace Tests\Feature\Api\V1\Reservation\Schedule;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\DataAccess\Eloquent\User;
use App\DataAccess\Eloquent\Restaurant;
use App\DataAccess\Eloquent\TableType;
use App\DataAccess\Eloquent\Course;
use App\DataAccess\Eloquent\Stock;

class MonthTest extends TestCase
{
    use DatabaseTransactions;

    protected $user;
    protected $tableType;
    protected $course;
    protected $stock;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $restaurant = factory(Restaurant::class)->create([
            'user_id' => $this->user->id
        ]);
        $this->tableType = factory(TableType::class)->create([
            'restaurant_id' => $restaurant->id,
            'user_id' => $this->user->id
        ]);
        $this->course = factory(Course::class)->create([
            'user_id' => $this->user->id
        ]);
        $this->course->tableTypes()->attach([$this->tableType->id]);
        $this->stock = factory(Stock::class)->create([
            'user_id' => $this->user->id,
            'table_type_id' => $this->tableType->id,
            'accept_date' => '2018-05-01',
            'acceptable_table_number' => 3,
        ]);
    }

    public function testIndex()
    {
        $response = $this->get('/api/v1/reservations/schedules/months?date=2018-05&table_type_id=' . $this->tableType->id . '&username=' . $this->user->name);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'disabled_dates',
        ]);
    }
}
