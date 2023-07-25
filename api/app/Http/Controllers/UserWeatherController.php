<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeatherResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserWeatherController extends Controller
{
    /**
     * Find the weather for the user with ID passed in params
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show($user): JsonResponse
    {
        return $this->successResponse(new WeatherResource($user->getWeather()));
    }
}