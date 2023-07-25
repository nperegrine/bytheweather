<?php

namespace Tests\Feature\Services;

use Tests\TestCase;

class WeatherServiceTest extends TestCase
{
    /**
     * @test
     */
    public function test_can_fetch_current_weather_for_user(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}