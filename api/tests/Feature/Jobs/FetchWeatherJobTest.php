<?php

namespace Tests\Feature\Jobs;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Queue;
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
        Queue::fake();
        $user = User::factory()->make();

        $this->artisan('weather:fetch')
            ->assertExitCode(0);

        Queue::assertPushed(FetchWeatherJob::class, function ($job, $user) {
            $this->assertTrue($job->user->is($user));
            return true;
        });
    }
}