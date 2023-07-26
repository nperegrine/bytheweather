<?php

namespace App\Providers;

use App\Contracts\Integrations\WeatherServiceContract;
use App\Services\OpenWeatherMapService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(WeatherServiceContract::class, OpenWeatherMapService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Http::macro('openWeatherMapAPI', function () {
            return Http::withHeaders([
                'Accept' => 'application/json',
            ])->baseUrl(env('OPEN_WEATHER_MAP_API_ENDPOINT'));
        });
    }
}
