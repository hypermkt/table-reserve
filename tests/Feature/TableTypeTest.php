<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \App\DataAccess\Eloquent\User;
use \App\DataAccess\Eloquent\Restaurant;

class TableTypeTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        // MEMO: Laravelで独自のsetUpを呼ぶ場合は、parent::setUpの呼び出しが必要
        // refs: https://readouble.com/laravel/5.6/ja/testing.html
        parent::setUp();
        $user = factory(User::class)->create();
        $restaurant = factory(Restaurant::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user)->withSession(['restaurant' => $restaurant]);
    }

    public function testIndex()
    {
        $response = $this->get('/table_types');
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this->get('/table_types/create');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $response = $this->post('/table_types', [
            'release_state' => 'public',
            'table_type_name' => 'hoge',
            'available_start_time' => '10:00',
            'available_end_time' => '19:00',
            'minimum_capacity' => 1,
            'max_capacity' => 4,
            'number_of_sales' => 3,
            'connectable' => 0,
        ]);
        $response->assertRedirect('/table_types');
    }
}
