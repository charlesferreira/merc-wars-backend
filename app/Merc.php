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
        // TODO: verificar se o merc tem stamina para ser contratado
        // TODO: descontar stamina do merc
        // TODO: incrementar o contador de contratações


        $this->player->addCoins($price);
    }
}
