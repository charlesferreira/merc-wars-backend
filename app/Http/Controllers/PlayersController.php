<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Error;
use App\Transformers\PlayerTransformer;

class PlayersController extends Controller
{
    public function store()
    {
        $player = Player::create(['name' => Player::randomName(), 'coins' => 0]);
        $data = fractal($player, PlayerTransformer::class)->toArray()['data'];

        return response()->json($data, 201);
    }

    public function show($playerId)
    {
        if ($player = Player::find($playerId)) {
            $data = fractal($player, PlayerTransformer::class)->toArray()['data'];
            return response()->json($data, 200);
        }

        return response()->json(Error::PLAYER_NOT_FOUND, 404);
    }
}
