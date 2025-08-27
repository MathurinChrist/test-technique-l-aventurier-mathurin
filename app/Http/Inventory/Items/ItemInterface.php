<?php

namespace App\Http\Inventory\Items;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface ItemInterface
{
    public function getName(): string;
    public function getDescription(): string;
    public function getWeight(): float;
    public function getQuantity(): int;
    public function getWearFactor(): float;
}
