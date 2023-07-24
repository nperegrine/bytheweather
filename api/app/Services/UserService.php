<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public function list(int $perPage = 20, string $orderBy = 'id desc'): LengthAwarePaginator
    {
        return User::orderByRaw(!empty($orderBy) ? $orderBy : 'id desc')
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