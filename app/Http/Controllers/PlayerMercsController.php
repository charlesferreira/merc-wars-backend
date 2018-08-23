<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class PlayerMercsController extends Controller
{
    public function store($playerId)
    {
        $player = Player::find($playerId);

        $player->createMerc(request('name'));

        return response()->json([], 201);
    }
}
