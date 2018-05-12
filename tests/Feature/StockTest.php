<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\DataAccess\Eloquent\User;
use App\DataAccess\Eloquent\Restaurant;
use App\DataAccess\Eloquent\TableType;

class StockTest extends TestCase
{
    use DatabaseTransactions;

    protected $page;

    public function setUp()
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $restaurant = factory(Restaurant::class)->create([
            'user_id' => $user->id,
        ]);
        factory(TableType::class)->create([
            'restaurant_id' => $restaurant->id,
            'user_id' => $user->id,
        ]);
        $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->get('/stocks');
        $response->assertStatus(200);
    }

}
