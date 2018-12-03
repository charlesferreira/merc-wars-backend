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

            'weaponId' => (int)$merc->weapon_id,
            'trunkId' => (int)$merc->trunk_id,
            'legsId' => (int)$merc->legs_id,
            'handId' => (int)$merc->hand_id,
            'feetId' => (int)$merc->feet_id,
            'headgearId' => (int)$merc->headgear_id,

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
