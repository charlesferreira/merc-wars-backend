<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Player;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Merc;

class PlayerMercsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function creating_a_merc()
    {
        // Arrange
        $player = factory(Player::class)->create();

        // Act
        $response = $this->postJson("/players/{$player->id}/mercs", [
            'name' => 'Rambo',
            'skin' => 'rambo_skin',
            'weapon' => 'machine_gun'
        ]);

        // Assert
        $response->assertStatus(201);
        $response->assertJson(['name' => 'Rambo', 'player_id' => $player->id]);
    }

    /** @test */
    public function retrieving_mercs_when_player_has_no_mercs()
    {
        // Arrange
        $player = factory(Player::class)->create();

        // Act
        $response = $this->getJson("/players/{$player->id}/mercs");

        // Assert
        $response->assertOk();
        $response->assertJsonCount(0);
    }

    /** @test */
    public function retrieving_mercs_for_player()
    {
        // Arrange
        $player = factory(Player::class)->create();
        factory(Merc::class)->create(['player_id' => $player->id]);
        factory(Merc::class)->create(['player_id' => $player->id]);
        factory(Merc::class)->create(['player_id' => $player->id]);

        // Act
        $response = $this->getJson("/players/{$player->id}/mercs");

        // Assert
        $response->assertOk();
        $response->assertJsonCount(3);
    }
}
