<?php

namespace Tests\Unit;

use App\Player;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PlayerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function player_can_create_a_merc()
    {
        // Arrange
        $player = factory(Player::class)->create();

        // Act
        $merc = $player->createMerc('Chuck Norris');

        // Assert
        $this->assertEquals('Chuck Norris', $merc->name);
    }

}
