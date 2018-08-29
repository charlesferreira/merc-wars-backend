<?php

namespace App\Http\Controllers;

use App\Player;
use App\Transformers\MercTransformer;

class PlayerMercsController extends Controller
{
    public function index($playerId)
    {
        $player = Player::find($playerId)->first();
        $data = fractal($player->mercs, MercTransformer::class)->toArray()['data'];

        return response()->json($data);
    }

    public function store($playerId)
    {
        $player = Player::find($playerId)->first();

        $merc = $player->createMerc(request('name'), request('skin'), request('weapon'));

        return response()->json($merc, 201);
    }
}
