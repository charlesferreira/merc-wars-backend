<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Merc;

class MercTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Merc $merc)
    {
        return [
            'id' => (int)$merc->id,
            'name' => (string)$merc->name,
            'head' => str_pad($merc->head, 2, '0', STR_PAD_LEFT),
            'color' => str_pad($merc->color, 2, '0', STR_PAD_LEFT),
            'weapon' => str_pad($merc->weapon, 2, '0', STR_PAD_LEFT),
            'headgear' => $merc->headgear ? str_pad($merc->headgear, 2, '0', STR_PAD_LEFT) : '',
            'feet' => (string)$merc->feet,
            'trunk' => (string)$merc->trunk,
            'hand' => (string)$merc->hand,
            'legs' => (string)$merc->legs,
            'defense' => (int)$merc->defense,
            'agility' => (int)$merc->agility,
            'force' => (int)$merc->force,
            'stamina' => (int)$merc->stamina,
            'hiringCount' => (int)$merc->hiring_count,
            'playerId' => (int)$merc->player_id,
            'playerName' => (string)$merc->player->name,
        ];
    }
}
