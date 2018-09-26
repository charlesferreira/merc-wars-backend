<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
