<?php

namespace App;

class HiringDetails
{
    private $items;

    public function __construct($json)
    {
        $this->items = collect(json_decode($json));
    }

    public function items()
    {
        return $this->items;
    }

    public function total()
    {
        return $this->items->sum('price');
    }
}
