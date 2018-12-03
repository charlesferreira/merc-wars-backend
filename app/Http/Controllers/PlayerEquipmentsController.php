<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Transformers\EquipmentTransformer;

class PlayerEquipmentsController extends Controller
{
    public function index($playerId)
    {
        if (!$player = Player::find($playerId)) {
            return response()->json(Error::PLAYER_NOT_FOUND, 404);
        }

        $data = fractal($player->equipments, EquipmentTransformer::class);
        return response()->json($data);
    }

    public function store($playerId)
    {
        $player = Player::find($playerId);

        $equipment = $player->createEquipment(request()->all());
        $data = fractal($equipment, EquipmentTransformer::class)->ToArray()['data'];

        return response()->json($data, 201);
    }
}
