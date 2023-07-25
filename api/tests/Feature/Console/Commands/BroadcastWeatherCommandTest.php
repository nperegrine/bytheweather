<?php

namespace Tests\Feature\Console\Commands;

use Tests\TestCase;

class BroadcastWeatherCommandTest extends TestCase
{
    /**
     * Test that we can successfully run the
     * command to broadcast the weather updates of each user
     * 
     * @return void
     */
    public function test_can_run_weather_broadcast_command(): void
    {
        $this->artisan('weather:broadcast')
            ->assertExitCode(0);
    }
}