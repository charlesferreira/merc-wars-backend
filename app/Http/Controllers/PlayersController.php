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

    public function show($playerID)
    {
        if ($player = Player::whereId($playerID)->first()) {
            $data = fractal($player, PlayerTransformer::class)->toArray()['data'];
            return response()->json($data, 200);
        }

        return response()->json(['error' => 'Player Not Found'], 404);
    }
}
