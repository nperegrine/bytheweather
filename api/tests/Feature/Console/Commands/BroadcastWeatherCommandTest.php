<?php

namespace Tests\Feature\Console\Commands;

use App\Events\WeatherUpdated;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class BroadcastWeatherCommandTest extends TestCase
{
    /**
     * Test that we can successfully run the
     * command to broadcast the weather updates of each user
     */
    public function test_can_run_weather_broadcast_command(): void
    {
        Event::fake();
        $user = User::factory()->create();

        Cache::shouldReceive('get')
            ->once()
            ->with('weather:user:'.$user->id)
            ->andReturn(['temp' => 20]);

        $this->artisan('weather:broadcast')
            ->assertExitCode(0);

        Event::assertDispatched(WeatherUpdated::class, function (WeatherUpdated $event) use ($user) {
            $this->assertTrue($event->user->is($user));
            $this->assertEquals(['temp' => 20], $event->weather);

            return true;
        });
    }
}
