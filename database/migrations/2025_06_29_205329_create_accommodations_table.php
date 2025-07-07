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
            
            $table->enum('type',['hotel', 'villa', 'guest_house', 'campsite'])->default('hotel'); // hotel, villa, guest_house, campsite

            $table->json('name');        // Translatable
            $table->json('description'); // Translatable
            $table->json('address');     // Translatable

            $table->string('price_range')->nullable();
            $table->string('main_image')->nullable();

            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();
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
