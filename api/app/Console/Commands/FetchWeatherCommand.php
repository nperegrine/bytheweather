<?php

namespace App\Console\Commands;

use App\Jobs\FetchWeatherJob;
use App\Models\User;
use Illuminate\Console\Command;

class FetchWeatherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the current weather for each user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        User::chunk(100, fn ($users) => $users->each(function ($user) {
            FetchWeatherJob::dispatch($user);
        }));
    }
}
