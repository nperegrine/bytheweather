<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Tests\TestCase;

class UserCoordinateTest extends TestCase
{
    public function test_can_show_user_coordinates_correctly(): void
    {
        $mockUser = User::factory()->create(['id' => 1]);

        $response = $this->getJson(route('users.coordinates', ['user' => $mockUser]));

        $response->assertOk()
                ->assertJsonMissing(['errors'])
                ->assertJsonStructure(['item' =>
                    [
                      'latitude',
                      'longitude',
                    ]
                  ]);
    }
}