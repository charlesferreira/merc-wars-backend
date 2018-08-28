<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merc;

class MercTeammatesController extends Controller
{
    public function index($mercId)
    {
        $merc = Merc::find($mercId);

        return $merc->teammates()->get();
    }
}
