<?php

namespace Tests\Feature\Events;

use App\Models\User;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class WeatherUpdatedTest extends TestCase
{
    /**
     * @test
     */
    public function test_can_dispatch_weather_update_event(): void
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