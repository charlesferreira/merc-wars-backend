<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Transformers\MatchTransformer;

class PlayerMatchesController extends Controller
{
    public function index($playerId)
    {
        $matches = Player::find($playerId)->matches()->get();
        $data = fractal($matches, MatchTransformer::class)->toArray();

        return response()->json($data);
    }
}
