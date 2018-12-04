<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function GuzzleHttp\json_decode;

class Player extends Model
{
    protected $guarded = [];

    public static function randomName()
    {
        $randomId = rand(1000, 9999);
        return sprintf('Commander #%d', $randomId);
    }

    public function mercs()
    {
        return $this->hasMany(Merc::class);
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    public function matches()
    {
        return $this->hasMany(Match::class);
    }

    public function startMatch(HiringDetails $hiringDetails)
    {
        $this->payForHiring($hiringDetails);

        return $this->matches()->create();
    }

    public function payForHiring(HiringDetails $hiringDetails)
    {
        $hiringDetails->items()->map(function ($item) {
            Merc::find($item->merc_id)->getHired($item->price);
        });

        $this->decrement('coins', $hiringDetails->total());
    }

    public function addCoins($amount)
    {
        $this->increment('coins', $amount);
    }

    public function removeCoins($amount)
    {
        $this->decrement('coins', $amount);
    }

    public function createMerc(array $data)
    {
        return $this->mercs()->create($data);
    }

    public function createEquipment(array $data)
    {
        return $this->equipments()->create($data);
    }
}
