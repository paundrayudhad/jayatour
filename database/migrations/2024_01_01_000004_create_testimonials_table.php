<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('traveler_name');
            $table->string('traveler_location')->nullable();
            $table->unsignedTinyInteger('rating')->default(5);
            $table->date('traveled_at')->nullable();
            $table->text('body');
            $table->foreignId('tour_package_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
