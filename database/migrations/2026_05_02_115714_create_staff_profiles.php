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

            // Translatable fields converted to JSON
            $table->json('name');
            $table->json('title');           
            $table->json('department')->nullable(); 
            $table->json('bio')->nullable();
            $table->json('bio_extended')->nullable(); 
            $table->json('qualifications')->nullable(); 

            $table->enum('role_type', ['vc', 'governance', 'leadership']);
            $table->string('portrait')->nullable();    
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

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