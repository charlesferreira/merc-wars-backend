<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name'];

    public function mercs()
    {
        return $this->hasMany(Merc::class);
    }

    public function createMerc($name, $skin, $weapon)
    {
        return $this->mercs()->create(compact('name', 'skin', 'weapon'));
    }
}
