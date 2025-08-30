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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // Reviewer
            $table->string('name')->nullable();
            $table->string('email')->nullable();

            // Polymorphic relation: reviewable_id + reviewable_type
            $table->morphs('reviewable');

            // Review fields
            $table->unsignedTinyInteger('rating'); // 1 to 5 stars
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
