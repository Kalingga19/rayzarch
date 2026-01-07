<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->year('year')->nullable();

            // architecture | interior | design
            $table->enum('category', ['architecture', 'interior', 'design']);

            $table->text('description')->nullable();

            // cover image (main thumbnail)
            $table->string('cover_image')->nullable();

            // gallery images (JSON array of paths)
            $table->json('gallery')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
