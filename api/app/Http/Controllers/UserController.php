<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
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
     * Returns a list of all users
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $users = $this->userService->list(
            (int) $request->get('size', 10),
            $request->get('sort', '')
        );

        return $this->successListResponse(UserResource::collection($users));
    }

    /**
     * Find the user with ID passed in params
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        return $this->successResponse(new UserResource($user));
    }

    /**
     * Returns the user with the ID as a param
     *
     * @param Request $request
     * @param User $user
     *
     * @return JsonResponse
     */
    public function update(SaveUserRequest $request, User $user): JsonResponse
    {
        $user = $this->userService->save($request->validated());

        return $this->successResponse(new UserResource($user));
    }

    /**
     * Returns the user with the ID as a param
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return $this->successEmptyResponse();
    }
}