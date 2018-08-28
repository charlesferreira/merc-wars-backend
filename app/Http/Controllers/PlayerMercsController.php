<?php

namespace App\Http\Controllers;

use App\Player;

class PlayerMercsController extends Controller
{
    public function index($playerId)
    {
        if ($player = Player::find($playerId))
            return $player->mercs;
    }

    public function store($playerId)
    {
        $player = Player::find($playerId);

        $merc = $player->createMerc(request('name'), request('skin'), request('weapon'));

        return response()->json($merc, 201);
    }
}
