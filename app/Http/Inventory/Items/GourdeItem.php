<?php

namespace App\Http\Inventory\Items;

class GourdeItem extends ItemAbstract
{
    public function __construct(int $quantity = 1)
    {
        parent::__construct(
            "Gourde",
            "Une gourde remplie d'eau",
            0.5,
            $quantity,
            0.9
        );
    }
}
