<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merc;
use App\Transformers\MercTransformer;

class MercsController extends Controller
{
    public function show($mercId)
    {
        if (!$merc = Merc::find($mercId)) {
            return response()->json(['error' => 'Merc Not Found'], 404);
        }

        $data = fractal($merc, MercTransformer::class)->toArray()['data'];
        return response()->json($data);
    }

    public function sendForHiring($mercId)
    {
        if (!$merc = Merc::find($mercId)) {
            return response()->json(['error' => 'Merc Not Found'], 404);
        }

        $merc->enableForHiring();
        $data = fractal($merc, MercTransformer::class)->toArray()['data'];
        return response()->json($data);
    }
}
