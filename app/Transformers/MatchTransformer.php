<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Match;

class MatchTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Match $match)
    {
        return [
            'id' => (int)$match->id,
            'playerId' => $match->player_id,
            'playerName' => $match->player->name,
            'enemiesKilled' => (int)$match->enemies_killed,
            'coinsEarned' => (int)$match->coins_earned,
            'victory' => (bool)$match->victory,
            'date' => $match->updated_at->toDateString()
        ];
    }
}
