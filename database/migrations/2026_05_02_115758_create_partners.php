<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();

            $table->string('name');                        // Full official organisation name
            $table->string('acronym')->nullable();         // e.g. "WHO", "MOHE"
            $table->string('logo')->nullable();            // Storage path

            // Drives the grouping/filtering on /about/collaborations
            // 'academic'      → other universities, research institutions
            // 'industry'      → private sector / corporate partners
            // 'government'    → ministries, statutory bodies
            // 'international' → foreign institutions / embassies
            // 'mou'           → explicit Memoranda of Understanding (may overlap with above)
            $table->enum('partnership_type', ['academic', 'industry', 'government', 'international', 'mou'])
                  ->default('academic');

            $table->string('country')->nullable();
            $table->string('website_url')->nullable();

            $table->text('description')->nullable();       // What the partnership covers
            $table->date('mou_signed_date')->nullable();   // Null = informal partnership
            $table->date('mou_expiry_date')->nullable();

            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('show_on_homepage')->default(false); // Logo carousel on home page

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};