<?php

namespace App\Http\Inventory\Items;

class CarteItem extends ItemAbstract
{
    public function __construct(int $quantity = 1)
    {
        parent::__construct(
            "carte",
            "La carte qui permettra à repérer les villes ou pays et aussi les frontières ",
            0.2,
            $quantity,
            0.98
        );
    }
}
