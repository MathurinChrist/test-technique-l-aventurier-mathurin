<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * for backpacks table and items table also associate those tables
     */
    public function up(): void {
        Schema::create('backpacks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('weight');
            $table->float('volume');
            $table->timestamps();
        });

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('weight');
            $table->float('volume')->nullable();
            $table->integer('quantity')->default(1);
            $table->float('wear_factor')->default(0);
            $table->foreignId('backpack_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('items');
        Schema::dropIfExists('backpacks');
    }
};
