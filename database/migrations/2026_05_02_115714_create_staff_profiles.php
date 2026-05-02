<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('staff_profiles', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('title');           // e.g. "Vice Chancellor", "Pro-Chancellor"
            $table->string('department')->nullable(); // e.g. "Office of the Vice Chancellor"

            // Drives which About sub-page this person appears on.
            // 'vc'         → /about/vice-chancellor  (only one record should be active)
            // 'governance' → /about/governance
            // 'leadership' → /about/leadership
            $table->enum('role_type', ['vc', 'governance', 'leadership']);

            $table->text('bio')->nullable();
            $table->text('bio_extended')->nullable(); // Longer version for dedicated profile pages

            $table->string('portrait')->nullable();    // Storage path, e.g. staff/portraits/vc.jpg
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // Academic credentials shown on governance/leadership cards
            $table->string('qualifications')->nullable(); // e.g. "PhD (Oxford), MSc (London)"

            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staff_profiles');
    }
};