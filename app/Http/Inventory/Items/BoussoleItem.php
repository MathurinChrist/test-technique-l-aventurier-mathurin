<?php

namespace App\Http\Inventory\Items;

class BoussoleItem extends ItemAbstract
{
    public function __construct(int $quantity = 1)
    {
        parent::__construct(
            "Boussole",
            "Une boussole fiable pour s'orienter",
            0.2,
            $quantity,
            0.98
        );
    }
}
