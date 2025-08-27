<?php

namespace App\Http\Inventory\Items;

class SacCouchageItem extends ItemAbstract
{
    public function __construct(int $quantity = 1)
    {
        parent::__construct(
            "Sac de couchage",
            "Sac de couchage confortable pour dormir",
            2.5,
            $quantity,
            0.95
        );
    }
}
