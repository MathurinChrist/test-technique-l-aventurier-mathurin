<?php

namespace App\Http\Inventory\Items;

class AmadouItem extends ItemAbstract
{
    public function __construct(int $quantity = 1)
    {
        parent::__construct(
            "Amadou",
            "Matériau inflammable pour démarrer un feu",
            0.05,
            $quantity,
            0.7
        );
    }
}
