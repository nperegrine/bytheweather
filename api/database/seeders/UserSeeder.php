<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public const UserSeedCount = 20;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(self::UserSeedCount)
            ->create();
    }
}
