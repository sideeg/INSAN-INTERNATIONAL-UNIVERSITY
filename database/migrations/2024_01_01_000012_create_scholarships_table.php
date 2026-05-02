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
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('tagline')->nullable();        // Short one-liner
            $table->longText('overview');                 // Rich description
            $table->json('benefits');                     // ["Full tuition", "Mentorship", ...]
            $table->json('eligibility_criteria');         // ["Muslim citizen", "Academic record", ...]
            $table->json('required_documents');           // ["Transcripts", "Recommendation letter", ...]
            $table->json('purposes')->nullable();         // ["Support disadvantaged students", ...]
            $table->text('application_process')->nullable();
            $table->date('application_deadline')->nullable();
            $table->string('application_url')->nullable(); // External portal link
            $table->string('duration')->nullable();       // "3–4 years"
            $table->text('renewal_conditions')->nullable();
            $table->json('impact_points')->nullable();    // Impact bullet points
            $table->string('partner_organisation')->nullable(); // UMSC
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
