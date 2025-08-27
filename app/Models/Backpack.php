<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backpack extends Model
{
    /** @use HasFactory<\Database\Factories\BackpackFactory> */
    use HasFactory;

    protected $fillable = ['name', 'weight', 'volume'];

    public function items() {
        //todo: Item just for persistance outside it is ItemAbstract
        return $this->hasMany(Item::class);
    }

    public function getTotalWeight(): float {
        return $this->items->sum('weight');
    }

    public function getTotalItems(): int {
        return $this->items->sum('quantity');
    }
}
