<?php

namespace Tests\Feature\Api;

use App\Enums\ErrorCodes;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_can_list_users(): void
    {
        $users = User::factory()->count(2)->create();

        $response = $this->getJson(route('users.index'));

        $response->assertOk()
            ->assertJson(
                fn(AssertableJson $json) => $json->has('items', 2)
                    ->has('items.1', fn($json) => $this->assertJsonHasUser($json, $users->get(0)))
                    ->has('items.0', fn($json) => $this->assertJsonHasUser($json, $users->get(1)))
                    ->etc()
            );
    }

    public function test_can_show_user_with_weather(): void
    {
        $mockUser = User::factory()->create(['id' => 1]);

        $response = $this->getJson(route('users.show', ['user' => $mockUser]));

        $response->assertOk()
                ->assertJsonMissing(['errors'])
                ->assertJsonStructure(['item']);
    }

    public function test_cannot_show_user_with_invalid_id(): void
    {
        $mockUser = 'invalid_id';

        $response = $this->getJson(route('users.show', ['user' => $mockUser]));

        $response->assertStatus(ErrorCodes::STD404);
    }

    public function test_can_delete_user_with_valid_id(): void
    {
        $mockUser = User::factory()->create(['id' => 1]);

        $response = $this->deleteJson(route('users.delete', ['user' => $mockUser->id]));

        $response->assertOk();
        $this->assertDatabaseIsMissingRow($mockUser);
    }

    public function test_cannot_delete_user_with_invalid_id(): void
    {
        $mockUserId = 'invalid_id';

        $response = $this->getJson(route('users.delete', ['user' => $mockUserId]));

        $response->assertStatus(ErrorCodes::STD404);
    }

    private function assertJsonHasUser(AssertableJson $json, User $user): void
    {
        $json->where('id', $user->id)
            ->where('name', $user->name)
            ->where('latitude', $user->latitude)
            ->where('longitude', $user->longitude)
            ->etc();
    }

    private function assertDatabaseIsMissingRow(User $user): void
    {
        $this->assertDatabaseMissing(
            'users',
            [
                'name'      => $user->name,
                'latitude'  => $user->latitude,
                'longitude' => $user->longitude,
            ]
        );
    }
}