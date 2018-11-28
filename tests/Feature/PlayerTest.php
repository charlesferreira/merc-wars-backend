<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Player;
use App\Error;

class PlayerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function registering_a_player()
    {
        // Act
        $response = $this->postJson('/players', ['name' => 'John Doe']);

        // Assert
        $response->assertStatus(201);
        $response->assertJson(['name' => 'John Doe']);
    }

    /** @test */
    public function getting_an_existing_player()
    {
        // Arrange
        factory(Player::class)->create(['name' => 'John Doe']);

        // Act
        $response = $this->getJson('/players/John Doe');

        // Assert
        $response->assertOk();
        $response->assertJson(['name' => 'John Doe']);
    }

    /** @test */
    public function failing_to_get_a_non_existing_player()
    {
        // Arrange
        // ...

        // Act
        $response = $this->getJson('/players/John Doe');

        // Assert
        $response->assertNotFound();
        $response->assertExactJson(Error::PLAYER_NOT_FOUND);
    }
}
