<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Tests\TestCase;

class UserWeatherTest extends TestCase
{
    public function test_can_show_user_weather(): void
    {
        $mockUser = User::factory()->create(['id' => 1]);

        $response = $this->getJson(route('users.weather', ['user' => $mockUser]));

        $response->assertOk()
                ->assertJsonMissing(['errors'])
                ->assertJsonStructure(['item']);
    }
}
