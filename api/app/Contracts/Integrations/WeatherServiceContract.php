<?php

namespace App\Contracts\Integrations;

use App\Models\User;

interface WeatherServiceContract
{
    public function fetchCurrentWeather(User $user);
}
