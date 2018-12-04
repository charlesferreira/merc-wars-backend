<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Equipment;

class EquipmentTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Equipment $equip)
    {
        return [
            'id' => (int)$equip->id,
            'type' => (string)$equip->type,
            'name' => (string)$equip->name,
            'bonus' => (int)$equip->bonus,
            'price' => (int)$equip->price,
            'playerId' => (int)$equip->player_id,
            'mercId' => (int)$equip->merc_id,
        ];
    }
}
