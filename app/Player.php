<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function mercs()
    {
        return $this->hasMany(Merc::class);
    }

    public function createMerc($name)
    {
        return $this->mercs()->create(['name' => $name]);
    }
}
