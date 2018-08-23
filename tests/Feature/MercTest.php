<?php

namespace Tests\Feature;

use App\Player;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MercTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function player_can_create_a_merc()
    {
        // Arrange
        $player = factory(Player::class)->create();

        // Act
        $response = $this->postJson("/players/{$player->id}/mercs", [
            'name' => 'Chuck Norris'
        ]);

        // Assert
        $response->assertStatus(201);

        $merc = $player->mercs()->where('name', 'Chuck Norris')->first();
        $this->assertNotNull($merc);
    }

}
