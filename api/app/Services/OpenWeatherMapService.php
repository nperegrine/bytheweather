<?php

namespace App\Services;

use App\Contracts\Integrations\WeatherServiceContract;
use App\Models\User;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenWeatherMapService implements WeatherServiceContract
{
    /**
     * @return mixed
     *
     * @throws GuzzleException
     */
    public function fetchCurrentWeather(User $user)
    {
        $response = Http::openWeatherMapAPI()
                        ->get("/data/3.0/onecall?lat={$user->latitude}&lon={$user->latitude}&appid=".strval(config('services.open-weather-map.key')));

        if ($response->successful()) {
            return $response->json()['current'];
        } else {
            Log::error('Error fetching weather update for user:'.$user->id);

            return null;
        }
    }
}
