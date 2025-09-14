<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('providers_traditional_dish', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_and_drink_id')->constrained()->cascadeOnDelete();
            $table->foreignId('traditional_dish_id')->constrained()->cascadeOnDelete();
            $table->json('includes')->nullable();
            $table->decimal('price', 8, 2)->nullable();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers_traditional_dish');
    }
};
