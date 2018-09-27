<?php

namespace App\Http\Controllers;

use App\Player;
use App\Transformers\MercTransformer;

class PlayerMercsController extends Controller
{
    public function index($playerId)
    {
        if (!$player = Player::find($playerId)) {
            return response()->json(['error' => 'Player Not Found'], 404);
        }

        $data = fractal($player->mercs, MercTransformer::class);
        return response()->json($data);
    }

    public function show($playerId, $mercId)
    {
        if (!$player = Player::find($playerId)) {
            return response()->json(['error' => 'Player Not Found'], 404);
        }

        if (!$merc = $player->mercs()->find($mercId)) {
            return response()->json(['error' => 'Merc Not Found'], 404);
        }

        $data = fractal($merc, MercTransformer::class)->toArray()['data'];
        return response()->json($data);
    }

    public function sendForHiring($playerId, $mercId)
    {
        if (!$player = Player::find($playerId)) {
            return response()->json(['error' => 'Player Not Found'], 404);
        }

        if (!$merc = $player->mercs()->find($mercId)) {
            return response()->json(['error' => 'Merc Not Found'], 404);
        }

        $merc->enableForHiring();
        $data = fractal($merc, MercTransformer::class)->toArray()['data'];
        return response()->json($data);
    }

    // public function store($playerId)
    // {
    //     $player = Player::find($playerId);

    //     $merc = $player->createMerc(request('name'), request('skin'), request('weapon'));
    //     $data = fractal($merc, MercTransformer::class)->ToArray()['data'];

    //     return response()->json($data, 201);
    // }
}
