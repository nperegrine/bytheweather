<?php

namespace Tests\Feature\Api;

use App\Enums\ErrorCodes;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_can_get_users(): void
    {
        $users = User::factory()->count(2)->create();

        $response = $this->getJson(route('api.users.index'));

        $response->assertOk()
            ->assertJson(
                fn(AssertableJson $json) => $json->has('items', 2)
                    ->has('items.1', fn($json) => $this->assertJsonHasUser($json, $users->get(1)))
                    ->has('items.0', fn($json) => $this->assertJsonHasUser($json, $users->get(0)))
                    ->etc()
            );
    }

    public function test_can_show_user_with_valid_id(): void
    {
        $mockUser = User::factory()->create(['id' => 1]);

        $response = $this->getJson(route('api.users.show', ['user' => $mockUser]));

        $response->assertOk()
                ->assertJsonMissing(['errors'])
                ->assertJsonStructure(['item']);
    }

    public function test_can_create_user_with_valid_data(): void
    {
        $user = User::factory()->make();

        $response = $this->postJson(route('api.users.store'), $user->toArray());

        $response->assertOk();
        $this->assertDatabaseHasRow($user);
    }

    public function test_cannot_create_user_with_invalid_data(): void
    {
        $response = $this->postJson(route('api.users.store'));

        $response->assertUnprocessable()
            ->assertJson(
                fn(AssertableJson $json) => $json->has('errors', 3)
                    ->has('errors.name')
                    ->has('errors.latitude')
                    ->has('errors.longitude')
                    ->etc()
            );
    }

    public function test_cannot_show_user_with_invalid_id(): void
    {
        $mockUser = 'invalid_id';

        $response = $this->getJson(route('api.users.show', ['user' => $mockUser]));

        $response->assertStatus(ErrorCodes::STD400)
                ->assertJsonStructure(['errors', 'warnings']);
    }

    private function assertJsonHasUser(AssertableJson $json, User $user): void
    {
        $json->where('id', $user->id)
            ->where('name', $user->name)
            ->etc();

        if ($user->coordinates->isNotEmpty()) {
            $json->has(
                'coordinates',
                $user->coordinates()->count(),
                fn($json) => $this->assertJsonHasUser($json, $user->coordinates)
            );
        }

        $json->etc();
    }

    private function assertDatabaseHasRow(User $user): void
    {
        $this->assertDatabaseHas(
            'users',
            [
                'name' => $user->name,
            ]
        );

        $this->assertDatabaseHas(
            'coordinates',
            [
                'user_id' => $user->id,
                'latitude' => $user->coordinates->latitude,
                'longitude' => $user->coordinates->longitude,
            ]
        );
    }
}