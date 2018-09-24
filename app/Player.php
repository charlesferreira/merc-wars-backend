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

    public function create5RandomMercs()
    {
        $names = [
            'Leigh', 'Bing', 'Gael', 'Churchill', 'Ignatz', 'Appleton', 'Freddy',
            'Copeland', 'Urban', 'Sheldon', 'Thorn', 'Penney', 'Boyce', 'Alston', 'Piret', 'Paddle',
            'Gunter', 'Deighton', 'Melvin', 'Riley', 'Rainier', 'Dukes', 'Wilmot', 'Crawford',
            'Emmerich', 'Charlton', 'Bergen', 'Atherton', 'Diether', 'Astley', 'Windham', 'Reeve',
            'Leodegrance', 'Clinton', 'Wilson', 'Thackeray', 'Perceval', 'Hallewell', 'Arnaldo', 'Stevenson'
        ];

        $shouldHaveHeadgear = rand(0, 100) > 50;

        $random = function ($arr) {
            return $arr[rand(0, count($arr) - 1)];
        };

        foreach (range(1, 5) as $_) {
            $this->mercs()->create([
                'name' => $random($names),
                'head' => $random(range(1, 9)),
                'color' => $random(range(1, 3)),
                'weapon' => $random(range(1, 5)),
                'headgear' => $shouldHaveHeadgear ? $random(range(1, 6)) : null,
            ]);
        }
    }
}
