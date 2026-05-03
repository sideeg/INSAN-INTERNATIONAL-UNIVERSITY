<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('slug')->unique();
            $table->json('tagline')->nullable();
            $table->json('overview');
            $table->json('benefits');
            $table->json('eligibility_criteria');
            $table->json('required_documents');
            $table->json('purposes')->nullable();
            $table->json('application_process')->nullable();
            $table->date('application_deadline')->nullable();
            $table->string('application_url')->nullable();
            $table->string('duration')->nullable();
            $table->text('renewal_conditions')->nullable();
            $table->json('impact_points')->nullable();
            $table->string('partner_organisation')->nullable();
            $table->string('partner_logo')->nullable();
            $table->boolean('covers_full_tuition')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['is_active', 'is_featured']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};