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
        Schema::create('crafts', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // translatable
            $table->json('description')->nullable();
            $table->json('location')->nullable(); // optional, where the craft is made
               // Category as ENUM
            $table->enum('category', [
                'textiles',     // carpets, clothes
                'pottery',      // clay, ceramics
                'jewelry',      // silver, beads
                'woodwork',     // carved wood
                'leather',      // bags, belts
                'metalwork',    // copper, brass
                'other'
            ])->default('other');
            $table->decimal('min_price', 10, 2)->nullable();
            $table->decimal('max_price', 10, 2)->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('main_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crafts');
    }
};
