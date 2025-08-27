<?php

namespace App\Http\Inventory\Items;

class CouteauChasseItem extends ItemAbstract
{
    public function __construct(int $quantity = 1)
    {
        parent::__construct(
            "Couteau de chasse",
            "Un couteau robuste pour la survie",
            0.7,
            $quantity,
            0.95
        );
    }
}

