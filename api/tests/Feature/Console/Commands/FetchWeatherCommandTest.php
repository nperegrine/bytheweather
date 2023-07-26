<?php

namespace Tests\Feature\Console\Commands;

use App\Jobs\FetchWeatherJob;
use App\Models\User;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class FetchWeatherCommandTest extends TestCase
{
    /**
     * Test that we can successfully run the
     * command to fetch the weather updates of each user
     */
    public function test_can_run_fetch_weather_command(): void
    {
        Bus::fake();
        $user = User::factory()->create();

        $this->artisan('weather:fetch')
            ->assertExitCode(0);

        Bus::assertDispatched(FetchWeatherJob::class, function (FetchWeatherJob $job) use ($user) {
            $this->assertTrue($job->user->is($user));

            return true;
        });
    }
}
