<?php

namespace App\Http\Controllers\Backpack;

use App\Http\Inventory\Items\BoussoleItem;
use App\Http\Inventory\Items\CarteItem;
use App\Http\Inventory\Items\GourdeItem;
use App\Http\Requests\Inventory\BackpackItemRequest;
use App\Models\Backpack;
use App\Providers\AppBackpackProvider;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class BackpackController extends Controller
{
    protected AppBackpackProvider $manager;

    public function __construct(AppBackpackProvider $manager)
    {
        $this->manager = $manager;
    }

    public function createBackpack (Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'weight' => 'required|numeric',
            'volume' => 'required|numeric',
        ]);
         Backpack::create($data);

        $backpacks = Backpack::all()->map(fn($b) => [
            'id' => $b->id,
            'name' => $b->name,
            'volume' => $b->volume,
            'total_items' => $b->getTotalItems(),
            'total_weight' => $b->getTotalWeight(),
        ]);

        return Inertia::render('inventory/backpackList', [
            'backpacks' => $backpacks->toArray(),
        ]);
    }

    public function index()
    {
        $backpacks = Backpack::all()->map(fn($b) => [
            'id' => $b->id,
            'name' => $b->name,
            'volume' => $b->volume,
            'total_items' => $b->getTotalItems(),
            'total_weight' => $b->getTotalWeight(),
        ]);

        return Inertia::render('inventory/backpackList', [
            'backpacks' => $backpacks->toArray(),
        ]);
    }

    public function show(Backpack $backpack)
    {
        return Inertia::render('inventory/backpackListItem', [
            'backpack' => [
                'id' => $backpack->id,
                'weight' => $backpack->weight,
                'volume' => $backpack->volume,
                'total_weight' => $backpack->getTotalWeight(),
                'total_items' => $backpack->getTotalItems(),
            ],
            'items' => $backpack->items->map(fn($item) => [
                'id' => $item->id,
                'name' => $item->name,
                'description' => $item->description,
                'weight' => $item->weight,
                'quantity' => $item->quantity,
                'wear_factor' => $item->wear_factor,
            ]),
        ]);
    }

    public function update(BackpackItemRequest $request, Backpack $backpack): RedirectResponse
    {
        $data = $request->validated();

        $item = match($data['type']) {
            'water_bottle' => new GourdeItem($data['quantity'] ?? 1),
            'boussole' => new BoussoleItem($data['quantity'] ?? 1),
            'carte' => new CarteItem($data['quantity'] ?? 1),
            default => null
        };

        if (!$item) {
            //todo: better to send in show backpack page with message error
            return redirect()->route('backpacks.show', $backpack);
        }

        $this->manager->addItem($backpack, $item);

        return redirect()->route('backpacks.show', $backpack);
    }

    public function remove(Request $request, Backpack $backpack): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'quantity' => 'integer|min:1',
        ]);

        $this->manager->removeItem($backpack, $data['name'], $data['quantity']);

        return redirect()->route('backpacks.show', $backpack);
    }
}
