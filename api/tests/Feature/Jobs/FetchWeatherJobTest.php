<?php

namespace Tests\Feature\Jobs;

use App\Jobs\FetchWeatherJob;
use App\Models\User;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class FetchWeatherJobTest extends TestCase
{
    /**
     * Test that we can successfully dispatch the
     * job to fetch the weather updates of each user
     * 
     * @return void
     */
    public function test_can_dispatch_fetch_weather_job(): void
    {
        Bus::fake();
        $user = User::factory()->make();

        FetchWeatherJob::dispatch($user);

        Bus::assertDispatched(FetchWeatherJob::class, function (FetchWeatherJob $job) use ($user) {
            $this->assertTrue($job->user->is($user));

            return true;
        });
    }
}