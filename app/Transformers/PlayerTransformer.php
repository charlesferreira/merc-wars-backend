<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Player;

class PlayerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Player $player)
    {
        return [
            'id' => (int)$player->id,
            'coins' => (int)$player->coins,
            'contracts' => (int)$player->contracts,
            'name' => $player->name,
        ];
    }
}
