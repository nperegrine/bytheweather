<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlaceResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserPlaceController extends Controller
{
    /**
     * Find the place for the user with ID passed in params
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show($user): JsonResponse
    {
        return $this->successResponse(new PlaceResource($user->place));
    }
}