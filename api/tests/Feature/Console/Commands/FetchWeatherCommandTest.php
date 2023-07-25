<?php

namespace Tests\Feature\Console\Commands;

use Tests\TestCase;

class FetchWeatherCommandTest extends TestCase
{
    /**
     * Test that we can successfully run the
     * command to fetch the weather updates of each user
     * 
     * @return void
     */
    public function test_can_run_fetch_weather_command(): void
    {
        $this->artisan('weather:fetch')
            ->assertExitCode(0);
    }
}