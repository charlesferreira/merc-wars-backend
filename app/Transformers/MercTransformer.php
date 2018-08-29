<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Merc;

class MercTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Merc $merc)
    {
        return [
            'id' => (int)$merc->id,
            'name' => $merc->name,
            'skin' => $merc->skin,
            'weapon' => $merc->weapon,
        ];
    }
}
