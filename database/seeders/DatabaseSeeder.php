<?php

namespace Database\Seeders;

use App\Http\Inventory\Items\BoussoleItem;
use App\Models\Backpack;
use App\Models\User;
use App\Providers\AppBackpackProvider;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $backpackService = new AppBackpackProvider();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $backpack = Backpack::factory()->create();

        $items = [
            new BoussoleItem(1)
        ];

        foreach ($items as $item) {
            $backpackService->addItem($backpack, $item);
        }
    }
}
