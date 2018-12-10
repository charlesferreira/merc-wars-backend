<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Merc extends Model
{
    protected $guarded = [];

    public function teammates()
    {
        return $this->query()
            ->where('player_id', '!=', $this->player_id)
            ->whereNotNull('name')
            ->where('feet_id', '>', 0)
            ->where('stamina', '>', 0);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function updateEquipment()
    {
        $keys = [
            'weapon_id',
            'trunk_id',
            'legs_id',
            'hand_id',
            'feet_id',
            'headgear_id',
        ];

        $ids = [];
        foreach ($keys as $key) {
            if (empty($this->$key))
                continue;
            $ids[] = $this->$key;
        }

        Equipment::where('merc_id', $this->id)->update(['merc_id' => 1]);
        Equipment::whereIn('id', $ids)->update(['merc_id' => $this->id]);
    }

    public function enableForHiring()
    {
        // tem que esperar acabar a stamina para
        // enviar novamente para contratação
        if ($this->stamina > 0) {
            return;
        }

        $this->increment('stamina', 100);
    }

    public function getHired($price)
    {
        if ($this->stamina <= 0) {
            return;
        }

        $this->decrement('stamina');
        $this->increment('hiring_count');

        $this->player->addCoins($price);
        $this->player->increment('contracts');
    }
}
