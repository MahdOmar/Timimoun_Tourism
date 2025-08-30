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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // e.g. "Toyota Hilux 4x4", "Apartment Sahara View"
            $table->enum('type', ['light_car','4x4_car', 'quad', 'apartment','house']); // rental type
            $table->json('description')->nullable();
            $table->decimal('price', 10, 2)->nullable(); 
            $table->enum('unit', ['day','hour']);
            $table->json('address')->nullable();
            $table->json('amenities')->nullable();
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
        Schema::dropIfExists('rentals');
    }
};
