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
        Schema::create('tours', function (Blueprint $table) {
           $table->id();

            // Translatable fields
            $table->json('name');
            $table->json('description')->nullable();
            $table->json('includes')->nullable();   // meals, guide, transport, etc.

            // Duration
            $table->integer('duration_days')->nullable();   // e.g. 7
            $table->integer('duration_nights')->nullable(); // e.g. 6

            // Pricing
            $table->decimal('price', 10, 2)->nullable();
            $table->unsignedTinyInteger('stops')->nullable(); 


            // Contact info
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->decimal('start_latitude', 10, 7)->nullable();
            $table->decimal('start_longitude', 10, 7)->nullable();

            $table->decimal('end_latitude', 10, 7)->nullable();
            $table->decimal('end_longitude', 10, 7)->nullable();

            // Classification
            $table->enum('category', ['cars','quads','camels'])->default('cars');

            $table->string('main_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
