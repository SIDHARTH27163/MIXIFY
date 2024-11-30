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
        Schema::create('communication_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Assuming user-specific settings
            $table->enum('allow_messages_from', ['everyone', 'friends', 'no_one'])->default('everyone');
            $table->integer('auto_delete_messages_after_days')->nullable();
            $table->enum('who_can_comment', ['everyone', 'friends', 'no_one'])->default('everyone');
            $table->boolean('block_offensive_comments')->default(false);
            $table->enum('who_can_tag', ['everyone', 'friends', 'no_one'])->default('everyone');
            $table->enum('who_can_mention', ['everyone', 'friends', 'no_one'])->default('everyone');
            $table->timestamps();
        });

        Schema::create('personalization_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Assuming user-specific settings
            $table->boolean('data_usage')->default(true); // Example toggle
            $table->boolean('personalization')->default(true); // Example toggle
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communication_settings');
        Schema::dropIfExists('personalization_settings');
    }
};
