<?php

namespace App\Services;

use App\Enums\PaginationCodes;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public function list(int $perPage = PaginationCodes::PGN_SMALL, string $orderBy = 'id desc'): LengthAwarePaginator
    {
        return User::with(['place'])->orderByRaw(! empty($orderBy) ? $orderBy : 'id desc')
            ->paginate($perPage)
            ->withQueryString();
    }

    public function save(User $user): User
    {
        $user->save();

        return $user;
    }

    public function delete(User $user): void
    {
        $user->delete();
    }
}
