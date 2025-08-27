<?php

namespace App\Http\Inventory\Items;

use App\Models\Backpack;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemAbstract implements ItemInterface
{
    protected string $name;
    protected string $description;
    protected float $weight;
    protected int $quantity;
    protected float $wearFactor;

    public function __construct(
        string $name,
        string $description,
        float $weight,
        int $quantity = 1,
        float $wearFactor = 1.0
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->weight = $weight;
        $this->quantity = $quantity;
        $this->wearFactor = $wearFactor;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getWeight(): float
    {
        return $this->weight * $this->quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getWearFactor(): float
    {
        return $this->wearFactor;
    }
}
