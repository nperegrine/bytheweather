<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SaveRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Returns a paginated list of all users
     */
    public function list(Request $request): JsonResponse
    {
        $users = $this->userService->list(
            (int) $request->get('size'),
            $request->get('sort', '')
        );

        return $this->successListResponse(UserResource::collection($users));
    }

    /**
     * Find the user with ID passed in params
     */
    public function show(User $user): JsonResponse
    {
        return $this->successResponse(new UserResource($user));
    }

    /**
     * Updates the user with the ID passed as param
     *
     * @param  SaveUserRequest  $request
     */
    public function update(SaveRequest $request, User $user): JsonResponse
    {
        $user->fill($request->validated());
        $user = $this->userService->save($user);

        return $this->successResponse(new UserResource($user));
    }

    /**
     * Deletes the user with the ID as a param
     */
    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return $this->successEmptyResponse();
    }
}
