<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseTest extends TestCase
{
    protected $page;
    protected $tableType;
    protected $baseUrl;

    public function setUp()
    {
        parent::setUp();
        $user = factory(\App\User::class)->create();
        $this->page = factory(\App\Restaurant::class)->create([
            'user_id' => $user->id
        ]);
        $this->tableType = factory(\App\TableType::class)->create([
            'page_id' => $this->page->id,
            'user_id' => $user->id,
        ]);
        $this->baseUrl = '/pages/' . $this->page->id . '/courses';
        $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->get($this->baseUrl);
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this->get($this->baseUrl . '/create');
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $response = $this->post($this->baseUrl, [
            'table_types' => [$this->tableType->id],
            'release_state' => 'public',
            'kind' => 'course_menu',
            'title' => 'hoge',
            'price' => 1000,
            'duration_minutes' => 60,
        ]);

        $response->assertRedirect($this->baseUrl);
    }
}
