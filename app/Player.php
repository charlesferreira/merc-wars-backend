<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function GuzzleHttp\json_decode;

class Player extends Model
{
    protected $guarded = [];

    public function mercs()
    {
        return $this->hasMany(Merc::class);
    }

    public function hireMercs($mercsJson)
    {
        $mercs = json_decode($mercsJson);
        if (!is_array($mercs)) {
            return;
        }

        foreach ($mercs as $hiringInfo) {
            Merc::find($hiringInfo->merc_id)->player->increment('coins', $hiringInfo->price);
        }
    }

    public function matches()
    {
        return $this->hasMany(Match::class);
    }

    public function startMatch()
    {
        return $this->matches()->create();
    }

    public
        function create5RandomMercs()
    {
        $names = [
            'Leigh', 'Bing', 'Gael', 'Churchill', 'Ignatz', 'Appleton', 'Freddy', 'Ronaldo', 'Silas',
            'Copeland', 'Urban', 'Sheldon', 'Thorn', 'Penney', 'Boyce', 'Alston', 'Piret', 'Paddle',
            'Gunter', 'Deighton', 'Melvin', 'Riley', 'Rainier', 'Dukes', 'Wilmot', 'Crawford', 'Rick',
            'Emmerich', 'Charlton', 'Bergen', 'Atherton', 'Diether', 'Astley', 'Windham', 'Reeve',
            'Leodegrance', 'Clinton', 'Wilson', 'Thackeray', 'Perceval', 'Hallewell', 'Arnaldo', 'Stevenson'
        ];

        $random = function ($arr) {
            return $arr[rand(0, count($arr) - 1)];
        };

        foreach (range(1, 5) as $_) {
            $shouldHaveHeadgear = rand(0, 100) > 50;
            $this->mercs()->create([
                'name' => $random($names),
                'head' => $random(range(1, 9)),
                'color' => $random(range(1, 3)),
                'weapon' => $random(range(1, 5)),
                'headgear' => $shouldHaveHeadgear ? $random(range(1, 6)) : null,
                'weapon' => $random(range(1, 5)),
                'defense' => $random(range(10, 30)),
                'agility' => $random(range(20, 40)),
                'force' => $random(range(5, 30)),
            ]);
        }
    }
}
