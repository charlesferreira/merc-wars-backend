<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Player;
use App\Merc;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MercTeammatesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function can_get_teammates_for_merc()
    {
        // Arrange
        $anotherPlayer = factory(Player::class)->create();
        foreach (range(1, 3) as $_) {
            factory(Merc::class)->create(['player_id' => $anotherPlayer->id]);
        }

        // Act
        $myPlayer = factory(Player::class)->create();
        $myMerc = factory(Merc::class)->create(['player_id' => $myPlayer->id]);

        // Assert
        $myTeammates = $myMerc->teammates()->get();
        $this->assertCount(3, $myTeammates);
        $this->assertFalse($myTeammates->contains('player_id', $myPlayer->id));
    }
}
