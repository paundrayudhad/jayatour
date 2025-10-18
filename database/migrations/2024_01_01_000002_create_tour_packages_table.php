<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('hero_image')->nullable();
            $table->string('location');
            $table->string('duration')->nullable();
            $table->string('price_label');
            $table->string('difficulty')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('itinerary')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->json('highlights')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tour_packages');
    }
};
