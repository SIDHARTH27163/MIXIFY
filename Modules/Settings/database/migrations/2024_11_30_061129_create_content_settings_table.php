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
        Schema::create('content_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->enum('post_visibility', ['public', 'friends', 'only_me'])->default('public');
            $table->boolean('location_sharing')->default(false);
            $table->boolean('hide_sensitive_content')->default(false);
            $table->boolean('auto_play_videos')->default(true);
            $table->string('language')->default('en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_settings');
    }
};
