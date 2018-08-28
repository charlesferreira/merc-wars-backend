<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Merc;
use App\Player;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MercTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function creating_a_merc()
    {
        // Arrange
        $player = factory(Player::class)->create();

        // Act
        factory(Merc::class)->create([
            'name' => 'Rambo',
            'skin' => 'rambo_skin',
            'weapon' => 'machine_gun',
            'player_id' => $player->id
        ]);

        // Assert
        $merc = Merc::first();
        $this->assertEquals('Rambo', $merc->name);
        $this->assertEquals('rambo_skin', $merc->skin);
        $this->assertEquals('machine_gun', $merc->weapon);
    }
}
