<?php

namespace Tests\Feature\Reservation;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\DataAccess\Eloquent\User;
use App\DataAccess\Eloquent\Restaurant;
use App\DataAccess\Eloquent\TableType;

class BookTest extends TestCase
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
        $response = $this->get('/reservations/books');
        $response->assertStatus(200);
    }
}
