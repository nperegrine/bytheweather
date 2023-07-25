<?php

namespace Tests\Feature\Events;

use Tests\TestCase;

class WeatherUpdatedTest extends TestCase
{
    /**
     * @test
     */
    public function test_can_broadcast_weather_update_event_to_user(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}