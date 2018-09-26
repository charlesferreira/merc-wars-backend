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
            'player_id' => $match->player_id,
            'player_name' => $match->player->name,
            'enemies_killed' => (int)$match->enemies_killed,
            'coins_earned' => (int)$match->coins_earned,
            'victory' => (bool)$match->victory,
            'date' => $match->created_at->toDateString()
        ];
    }
}
