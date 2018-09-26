<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Transformers\MatchTransformer;

class PlayerMatchesController extends Controller
{
    public function index($playerId)
    {
        $matches = Player::find($playerId)->matches;
        $data = fractal($matches, MatchTransformer::class)->toArray();

        return response()->json($data);
    }

    public function store($playerId)
    {
        $player = Player::find($playerId);
        $data = $player->hireMercs(request()->input('hiredMercs'));

        $match = $player->startMatch();
        $data = fractal($match, MatchTransformer::class)->ToArray()['data'];

        return response()->json($data, 201);
    }
}
