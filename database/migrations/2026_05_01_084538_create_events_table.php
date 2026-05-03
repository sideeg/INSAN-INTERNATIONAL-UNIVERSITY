<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // Slug stays a string for clean URLs
            
            // Translatable fields converted to JSON
            $table->json('title');
            $table->json('location');
            $table->json('time'); // E.g., "9 AM" vs "٩ صباحاً"
            $table->json('description');
            $table->json('schedule')->nullable();
            
            $table->enum('category', ['academic', 'cultural', 'sports', 'social']);
            $table->string('thumbnail');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};