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
            'name' => $merc->name,
            'head' => str_pad($merc->head, 2, '0', STR_PAD_LEFT),
            'color' => str_pad($merc->color, 2, '0', STR_PAD_LEFT),
            'weapon' => str_pad($merc->weapon, 2, '0', STR_PAD_LEFT),
            'headgear' => $merc->headgear ? str_pad($merc->headgear, 2, '0', STR_PAD_LEFT) : '',
            'defense' => (int)$merc->defense,
            'agility' => (int)$merc->agility,
            'force' => (int)$merc->force,
            'player_id' => (int) $merc->player_id,
            'player_name' => $merc->player->name,
        ];
    }
}
