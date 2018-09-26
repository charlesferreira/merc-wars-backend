<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $guarded = [];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function finish($data)
    {
        // evita pagar duas vezes pela mesma partida
        if ($this->created_at != $this->updated_at) {
            return;
        }

        $this->update($data);
        $this->player->addCoins($this->coins_earned);
    }
}
