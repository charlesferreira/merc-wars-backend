<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Transformers\MatchTransformer;
use App\HiringDetails;

class PlayerMatchesController extends Controller
{
    public function index($playerId)
    {
        $player = Player::find($playerId);

        if (!$player) {
            return response()->json(['error' => 'Player Not Found'], 404);
        }

        $data = fractal($player->matches, MatchTransformer::class)->toArray();
        return response()->json($data);
    }

    public function store($playerId)
    {
        $player = Player::find($playerId);

        if (!$player) {
            return response()->json(['error' => 'Player Not Found'], 404);
        }

        $player->payForHiring(new HiringDetails(request()->input('hiringDetails')));

        $data = fractal($player->startMatch(), MatchTransformer::class)->ToArray()['data'];

        return response()->json($data, 201);
    }
}
