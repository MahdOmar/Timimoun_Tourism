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
        Schema::create('sites', function (Blueprint $table) {
             $table->id();

            // Basic Info
            $table->json('name');              // Translatable name
            $table->json('description')->nullable();
            $table->json('address')->nullable();

            // Classification
            $table->enum('type', [
                'monument', 
                'museum', 
                'natural', 
                'historical', 
                'religious', 
                'other'
            ])->default('other');

            // Location
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // Media
            $table->string('main_image')->nullable();

            // Extras
            $table->json('opening_hours')->nullable(); // Even if free, you might have "Open 24h" or "Closed Mondays"
            $table->json('amenities')->nullable(); // Example: ["parking", "guided tours", "restrooms"]
            
            // SEO
            $table->string('slug')->unique()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
