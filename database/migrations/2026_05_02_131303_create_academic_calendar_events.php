<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('academic_calendar_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('category', [
                'admission',
                'academic',
                'examination',
                'graduation',
                'holiday',
                'orientation',
                'other',
            ])->default('academic');
            $table->string('color', 20)->default('#F53003'); // hex for frontend
            $table->boolean('is_all_day')->default(true);
            $table->boolean('is_published')->default(true);
            $table->string('academic_year', 9); // e.g. "2024/2025"
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['academic_year', 'is_published']);
            $table->index(['start_date', 'end_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('academic_calendar_events');
    }
};