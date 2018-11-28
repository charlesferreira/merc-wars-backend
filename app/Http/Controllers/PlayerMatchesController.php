<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Transformers\MatchTransformer;
use App\HiringDetails;
use App\Match;
use App\Error;

class PlayerMatchesController extends Controller
{
    /**
     * Fornece uma lista de partidas do player
     */
    public function index($playerId)
    {
        if (!$player = Player::find($playerId)) {
            return response()->json(Error::PLAYER_NOT_FOUND, 404);
        }

        $data = fractal($player->matches, MatchTransformer::class)->toArray();
        return response()->json($data);
    }

    /**
     * Cria uma nova partida
     */
    public function store($playerId)
    {
        if (!$player = Player::find($playerId)) {
            return response()->json(Error::PLAYER_NOT_FOUND, 404);
        }

        $match = $player->startMatch(new HiringDetails(request('hiringDetails')));
        $data = fractal($match, MatchTransformer::class)->ToArray()['data'];
        return response()->json($data, 201);
    }

    /**
     * Processa o fim da partida, atualizando o resultado e pagando o player
     */
    public function update($playerId, $matchId)
    {
        if (!$player = Player::find($playerId)) {
            return response()->json(Error::PLAYER_NOT_FOUND, 404);
        }

        if (!$match = $player->matches()->find($matchId)) {
            return response()->json(Error::MATCH_NOT_FOUND, 404);
        }

        $match->finish(request()->only(['enemies_killed', 'coins_earned', 'victory']));
        $data = fractal($match, MatchTransformer::class)->ToArray()['data'];
        return response()->json($data, 201);
    }
}
