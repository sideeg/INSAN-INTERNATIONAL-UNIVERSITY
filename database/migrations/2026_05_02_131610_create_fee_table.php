<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fee_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // e.g. "Tuition Fees", "Accommodation"
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fee_category_id')->constrained()->cascadeOnDelete();
            $table->string('programme_level');   // Undergraduate, Postgraduate, Diploma, Certificate
            $table->string('programme_name')->nullable(); // e.g. "B.Sc. Computer Science"
            $table->string('name');              // Fee line item name
            $table->decimal('amount', 12, 2);
            $table->string('currency', 3)->default('UGX');
            $table->enum('frequency', ['per_semester', 'per_year', 'once', 'per_module'])->default('per_year');
            $table->text('notes')->nullable();
            $table->string('academic_year', 9);  // e.g. "2024/2025"
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['fee_category_id', 'academic_year', 'is_active']);
            $table->index('programme_level');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fees');
        Schema::dropIfExists('fee_categories');
    }
};