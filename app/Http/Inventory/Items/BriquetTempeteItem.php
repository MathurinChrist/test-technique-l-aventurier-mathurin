<?php

namespace App\Http\Inventory\Items;

class BriquetTempeteItem extends ItemAbstract
{
    public function __construct(int $quantity = 1)
    {
        parent::__construct(
            "Briquet tempête",
            "Un briquet résistant au vent pour allumer un feu",
            0.15,
            $quantity,
            0.85
        );
    }
}
