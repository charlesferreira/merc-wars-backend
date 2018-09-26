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

    public function getHired($price)
    {
        if ($this->stamina <= 0) {
            return;
        }

        $this->decrement('stamina')->increment('hiring_count');

        $this->player->addCoins($price);
    }
}
