<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TableTypeTest extends TestCase
{
    protected $page;

    public function setUp()
    {
        // MEMO: Laravelで独自のsetUpを呼ぶ場合は、parent::setUpの呼び出しが必要
        // refs: https://readouble.com/laravel/5.6/ja/testing.html
        parent::setUp();
        $user = factory(\App\User::class)->create();
        $this->page = factory(\App\Page::class)->create([
            'user_id' => $user->id
        ]);
        $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->get('/pages/' . $this->page->id . '/table_types');
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this->get('/pages/' . $this->page->id . '/table_types/create');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $response = $this->post('/pages/' . $this->page->id . '/table_types', [
            'release_state' => 'public',
            'title' => 'hoge',
            'start_time' => '10:00',
            'end_time' => '19:00',
            'minimum_capacity' => 1,
            'max_capacity' => 4,
            'number_of_sales' => 3,
            'connectable' => 0,
        ]);
        $response->assertRedirect('/pages/' . $this->page->id . '/table_types');
    }
}
