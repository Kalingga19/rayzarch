<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            // Intro website text
            $table->text('intro_text')->nullable();

            // Profile section
            $table->string('profile_name')->nullable();
            $table->text('profile_text')->nullable();

            // Motto + logo
            $table->string('motto_text')->nullable();
            $table->string('logo_path')->nullable();

            // images for about page (JSON)
            $table->json('featured_images')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
