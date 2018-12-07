<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merc;
use App\Transformers\MercTransformer;
use App\Equipment;
use App\Transformers\EquipmentTransformer;

class MercTeammatesController extends Controller
{
    public function index($mercId)
    {
        $teammates = Merc::find($mercId)->teammates()->get();
        $data = fractal($teammates, MercTransformer::class)->toArray();

        return response()->json($data);
    }

    public function inventory($mercId)
    {
        $ids = explode(',', request()->input('ids', ''));
        $equipments = Equipment::whereIn('merc_id', $ids)->get();
        $data = fractal($equipments, EquipmentTransformer::class);
        return response()->json($data);
    }
}
