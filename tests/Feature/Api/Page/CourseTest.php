<?php

namespace Tests\Feature\Api\Page;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseTest extends TestCase
{
    protected $baseUrl;
    protected $page;

    public function setUp()
    {
        parent::setUp();
        $user = factory(\App\User::class)->create();
        $this->page = factory(\App\Page::class)->create([
            'user_id' => $user->id
        ]);
        $this->baseUrl = '/api/pages/' . $this->page->id . '/courses';
    }

    public function testIndex()
    {
        $response = $this->get($this->baseUrl);
        $response->assertStatus(200);
    }

}
