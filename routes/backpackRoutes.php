<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backpack\BackpackController;

Route::prefix('backpacks')->group(function () {
    Route::get('/', [BackpackController::class, 'index'])->name('Backpack.list');
    Route::post('/', [BackpackController::class, 'createBackpack'])->name('backpacks.create');
    Route::get('{backpack}', [BackpackController::class, 'show'])->name('backpacks.show');
    Route::post('{backpack}/update', [BackpackController::class, 'update'])->name('backpacks.update');
    Route::post('{backpack}/remove', [BackpackController::class, 'remove'])->name('backpacks.remove');
});

