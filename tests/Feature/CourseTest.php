<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseTest extends TestCase
{
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
            'table_types' => [1, 2],
            'release_state' => 'public',
            'kind' => 'course_menu',
            'title' => 'hoge',
            'price' => 1000,
            'duration_minutes' => 60,
        ]);
        $response->assertRedirect('/courses');
    }
}
