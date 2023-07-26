<?php

namespace App\Console\Commands;

use App\Events\WeatherUpdated;
use App\Models\User;
use Illuminate\Console\Command;

class BroadcastWeatherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:broadcast';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Broadcast the current weather update to each user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        User::chunk(10, fn ($users) => $users->each(function ($user) {
            WeatherUpdated::dispatch($user, $user->getWeather());
        }));
    }
}
