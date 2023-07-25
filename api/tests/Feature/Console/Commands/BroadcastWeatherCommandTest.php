<?php

namespace Tests\Feature\Console\Commands;

use App\Jobs\FetchWeatherJob;
use App\Models\User;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class BroadcastWeatherCommandTest extends TestCase
{
    /**
     * Test that we can successfully dispatch the
     * job to fetch the weather updates of each user
     * 
     */
    public function it_dispatches_fetch_jobs(): void
    {
        Queue::fake();
        $user = User::factory()->create();

        $this->artisan('weather:fetch')
            ->assertExitCode(0);

        Queue::assertPushed(FetchWeatherJob::class, function ($job, $user) {
            $this->assertTrue($job->user->is($user));
            return true;
        });
    }
}