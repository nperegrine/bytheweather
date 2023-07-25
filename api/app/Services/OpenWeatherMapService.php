<?php

namespace App\Services;

use App\Contracts\Integrations\WeatherServiceContract;
use App\Models\User;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Http;

class OpenWeatherMapServices implements WeatherServiceContract
{
     /**
     * @param User $user
     *
     * @return mixed
     * @throws GuzzleException
     */
    public function fetchCurrentWeather(User $user)
    {
        $response = Http::openWeatherMapAPI()
                        ->post('/data/2.5/weather?lat='.$user->latitude/'&lon='.$user->longitude.'&appid='.strval(config('services.open-weather-map.key')));

        return $response->json()['access_token'];
    }
}