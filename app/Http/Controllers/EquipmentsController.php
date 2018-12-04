<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\Player;

class EquipmentsController extends Controller
{
    public function destroy($id)
    {
        if (!$equipment = Equipment::find($id)) {
            return response()->json(['error' => 'Equipment Not Found'], 404);
        }

        if ($player = Player::find($equipment->player_id)) {
            $player->addCoins($equipment->price / 2);
        }

        $equipment->delete();
        return response()->json('ok');
    }
}
