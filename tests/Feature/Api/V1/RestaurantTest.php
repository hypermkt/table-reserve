<?php

namespace Tests\Feature\Api\V1;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\DataAccess\Eloquent\User;
use App\DataAccess\Eloquent\Restaurant;

class RestaurantTest extends TestCase
{
    use DatabaseTransactions;

    protected $restaurant;

    public function setUp()
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $this->restaurant = factory(Restaurant::class)->create([
            'user_id' => $user->id
        ]);
    }

    public function testShow()
    {
        $response = $this->get('/api/v1/restaurants/' . $this->restaurant->id);
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $response = $this->put('/api/v1/restaurants/' . $this->restaurant->id, [
            'release_state' => 'public'
        ]);
        $response->assertStatus(200);
    }
}
