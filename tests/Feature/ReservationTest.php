<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReservationTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/reservations/courses');
        $response->assertstatus(200);
    }

    public function testShow()
    {
        $response = $this->get('/reservations/courses/1');
        $response->assertstatus(200);
    }
}
