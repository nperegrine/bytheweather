<?php

namespace Tests\Feature\Console\Commands;

use App\Events\WeatherUpdated;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class BroadcastWeatherCommandTest extends TestCase
{
    /**
     * Test that we can successfully dispatch the
     * event to broadcast the weather updates of each user
     * 
     * @return void
     */
    public function test_can_broadcast_weather_updates_to_users(): void
    {
        Event::fake();
        $user = User::factory()->create();

        $this->artisan('weather:update')
            ->assertExitCode(0);

        Event::assertDispatched(WeatherUpdated::class, function ($event)  use ($user) {
            $this->assertTrue($event->user->is($user));
            return true;
        });
    }
}