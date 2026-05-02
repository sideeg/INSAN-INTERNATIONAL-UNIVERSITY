<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('type'); // BSc, BA, LLB, MSc, MBA, etc.
            $table->enum('category', ['undergraduate', 'graduate', 'continuing']);
            $table->string('icon')->default('fa-graduation-cap');
            $table->string('badge');
            $table->text('description');
            $table->string('duration');
            $table->string('credits');
            $table->string('intake');
            $table->json('requirements');
            $table->json('fees');
            $table->json('modules');
            $table->string('thumbnail')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programmes');
    }
};