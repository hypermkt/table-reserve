<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StockTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/stocks');
        $response->assertStatus(200);
    }

}
