<?php

namespace App\Providers;

use App\Http\Inventory\Items\ItemAbstract;
use App\Models\Backpack;

class AppBackpackProvider
{
    public function addItem(Backpack $backpack, ItemAbstract $item): void
    {
        $existing = $backpack->items()->where('name', $item->getName())->first();

        if ($existing) {
            $existing->quantity += $item->getQuantity();
            $existing->save();
        } else {
            $backpack->items()->create([
                'name' => $item->getName(),
                'description' => $item->getDescription(),
                'weight' => $item->getWeight(),
                'quantity' => $item->getQuantity(),
                'wear_factor' => $item->getWearFactor(),
            ]);
        }
    }

    public function removeItem(Backpack $backpack, string $itemName, int $amount = 1): void {
        $item = $backpack->items()->where('name', $itemName)->first();
        if ($item) {
            $item->quantity -= $amount;
            if ($item->quantity <= 0) $item->delete();
            else $item->save();
        }
    }
}

