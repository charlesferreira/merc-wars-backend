<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merc extends Model
{
    protected $fillable = ['name', 'skin', 'weapon'];

    public function teammates()
    {
        return $this->query()->where('player_id', '!=', $this->player_id);
    }
}
