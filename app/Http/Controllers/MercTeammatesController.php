<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merc;
use App\Transformers\MercTransformer;

class MercTeammatesController extends Controller
{
    public function index($mercId)
    {
        $teammates = Merc::find($mercId)->teammates;
        $data = fractal($teammates, MercTransformer::class)->toArray();

        return response()->json($data);
    }
}
