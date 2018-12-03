<?php

namespace App\Http\Controllers;

use App\Player;
use App\Error;
use App\Transformers\MercTransformer;
use App\Merc;
use Illuminate\Support\Facades\Log;
use App\Equipment;

class PlayerMercsController extends Controller
{
    public function index($playerId)
    {
        if (!$player = Player::find($playerId)) {
            return response()->json(Error::PLAYER_NOT_FOUND, 404);
        }

        $data = fractal($player->mercs, MercTransformer::class);
        return response()->json($data);
    }

    public function store($playerId)
    {
        $player = Player::find($playerId);

        $merc = $player->createMerc(request()->all());
        $merc->updateEquipment();
        $data = fractal($merc, MercTransformer::class)->ToArray()['data'];

        return response()->json($data, 201);
    }

    public function update($playerId, $mercId)
    {
        if (!$merc = Merc::find($mercId)) {
            return response()->json(Error::MERC_NOT_FOUND, 404);
        }

        if ($merc->player_id != $playerId) {
            return response()->json(Error::MERC_DOES_NOT_BELONG_TO_PLAYER, 404);
        }


        Log::alert(request()->all());

        $merc->update(request()->all());
        $merc->updateEquipment();
        $data = fractal($merc, MercTransformer::class)->ToArray()['data'];

        return response()->json($data, 201);
    }
}
