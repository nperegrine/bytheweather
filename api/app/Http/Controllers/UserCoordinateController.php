<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserCoordinateController extends Controller
{
    /**
     * Get the coordinates for the user with ID passed in params
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        return $this->successResponse(['latitude' => $user->latitude, 'longitude' => $user->longitude]);
    }
}