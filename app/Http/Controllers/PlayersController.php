<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Transformers\PlayerTransformer;

class PlayersController extends Controller
{
    public function store()
    {
        $player = Player::create(['name' => request('name')]);
        $data = fractal($player, PlayerTransformer::class)->toArray()['data'];

        return response()->json($data, 201);
    }

    public function show($playerName)
    {
        if ($player = Player::whereName($playerName)->first()) {
            return response()->json($player, 200);
        }

        return response()->json(['error' => 'Player Not Found'], 404);
    }
}
