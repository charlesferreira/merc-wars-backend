<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merc extends Model
{
    protected $guarded = [];

    public function teammates()
    {
        return $this->query()->where('player_id', '!=', $this->player_id);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function enableForHiring()
    {
        // tem que esperar acabar a stamina para
        // enviar novamente para contratação
        if ($this->stamina > 0) {
            return;
        }

        $this->increment('stamina', 10);
    }

    public function getHired($price)
    {
        if ($this->stamina <= 0) {
            return;
        }

        $this->decrement('stamina');
        $this->increment('hiring_count');

        $this->player->addCoins($price);
    }
}
