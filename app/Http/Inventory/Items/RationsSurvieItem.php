<?php

namespace App\Http\Inventory\Items;

class RationsSurvieItem extends ItemAbstract
{
    public function __construct(int $quantity = 1)
    {
        parent::__construct(
            "Rations de survie",
            "Pack de nourriture pour survivre en milieu hostile",
            1.0,
            $quantity,
            0.8
        );
    }
}

