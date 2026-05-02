<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graduation_events', function (Blueprint $table) {
            $table->id();

            // Ordinal number of the convocation, e.g. 1 → "1st Convocation"
            $table->unsignedTinyInteger('convocation_number')->nullable();

            $table->string('title');                   // e.g. "3rd Convocation Ceremony"
            $table->string('slug')->unique();

            // 'convocation' → main ceremony page/archive entry
            // 'announcement'→ upcoming convocation notice
            // 'alumni'      → alumni spotlight / reunion article
            $table->enum('type', ['convocation', 'announcement', 'alumni'])->default('convocation');

            $table->text('description')->nullable();
            $table->string('venue')->nullable();
            $table->date('ceremony_date')->nullable();

            $table->string('cover_image')->nullable();     // Hero / archive thumbnail
            $table->json('gallery_images')->nullable();    // JSON array of storage paths

            // Aggregate statistics shown on archive card
            $table->unsignedInteger('graduates_count')->nullable();
            $table->string('keynote_speaker')->nullable();

            $table->string('programme_booklet_url')->nullable(); // PDF download link
            $table->string('live_stream_url')->nullable();       // Before ceremony

            $table->boolean('is_published')->default(false);
            $table->unsignedSmallInteger('sort_order')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graduation_events');
    }
};