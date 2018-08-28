<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Player;
use App\Merc;

class MercTeammatesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function getting_teammates_for_merc()
    {
        // Arrange
        $anotherPlayer = factory(Player::class)->create();
        foreach (range(1, 3) as $_) {
            factory(Merc::class)->create(['player_id' => $anotherPlayer->id]);
        }

        $myPlayer = factory(Player::class)->create();
        $myMerc = factory(Merc::class)->create(['player_id' => $myPlayer->id]);

        // Act
        $response = $this->getJson("/mercs/{$myMerc->id}/teammates");

        // Assert
        $response->assertOk();
        $response->assertJsonCount(3);
        $response->assertJson([['player_id' => $anotherPlayer->id]]);
    }
}
