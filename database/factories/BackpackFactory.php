<?php

namespace Database\Factories;

use App\Models\Backpack;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Backpack>
 */
class BackpackFactory extends Factory
{
    protected $model = Backpack::class;

    public function definition(): array
    {
        return [
            'name' => 'Sac de l\'aventurier',
            'weight' => 30.0,
            'volume' => 50.0,
        ];
    }
}
