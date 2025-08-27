<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['backpack_id', 'name', 'description', 'weight', 'quantity', 'wear_factor',];

    public function backpack(): BelongsTo
    {
        return $this->belongsTo(Backpack::class);
    }
}
