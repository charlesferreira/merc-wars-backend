<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Player;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PlayerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function creating_a_player()
    {
        $player = factory(Player::class)->create(['name' => 'John Doe']);

        $this->assertEquals('John Doe', Player::first()->name);
    }
}
