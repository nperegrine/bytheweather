<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeatherResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserWeatherController extends Controller
{
    /**
     * Get the weather for the user with ID passed in params
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        return $this->successResponse(new WeatherResource($user->getWeather()));
    }
}