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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();

            $table->enum('type', ['hotel', 'villa', 'guest_house', 'campsite'])->default('hotel'); // hotel, villa, guest_house, campsite

            $table->json('name');        // Translatable
            $table->json('description'); // Translatable
            $table->json('address');     // Translatable
            
            $table->unsignedTinyInteger('stars')->nullable(); 

            $table->decimal('min_price', 10, 2)->nullable();
            $table->decimal('max_price', 10, 2)->nullable();

            $table->string('main_image')->nullable();
            $table->json('amenities')->nullable(); // ✅ New column for amenities (wifi, pool, parking, etc.)

            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodations');
    }
};
