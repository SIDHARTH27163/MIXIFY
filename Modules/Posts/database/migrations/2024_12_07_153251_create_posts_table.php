<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->string('title');
            $table->text('caption')->nullable(); // Caption field
           
            // $table->string('type'); // 'single', 'multiple', 'custom', or 'video'
            $table->json('media')->nullable(); // JSON for images/videos
            $table->string('location')->nullable(); // Location field
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->json('tags')->nullable(); // Tags as JSON
            // $table->json('hashtags')->nullable(); // Hashtags as JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
