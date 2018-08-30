<?php

namespace App\Http\Controllers;

use App\Player;
use App\Transformers\MercTransformer;

class PlayerMercsController extends Controller
{
    public function index($playerId)
    {
        $player = Player::find($playerId);
        $data = fractal($player->mercs, MercTransformer::class);

        return response()->json($data);
    }

    public function store($playerId)
    {
        $player = Player::find($playerId);

        $merc = $player->createMerc(request('name'), request('skin'), request('weapon'));
        $data = fractal($merc, MercTransformer::class)->ToArray()['data'];

        return response()->json($data, 201);
    }
}
