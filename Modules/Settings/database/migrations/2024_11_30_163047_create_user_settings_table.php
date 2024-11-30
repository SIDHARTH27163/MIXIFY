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
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Data Sharing
            $table->boolean('allow_data_sharing')->default(false);
            $table->boolean('data_copy_download')->default(false);

            // Ad Preferences
            $table->boolean('manage_interests')->default(true);
            $table->boolean('disable_personalized_ads')->default(false);

            // Activity Tracking
            $table->boolean('enable_tracking')->default(true);
            $table->boolean('clear_history')->default(false);

            // Appearance and Accessibility
            $table->json('custom_appearance')->nullable(); // e.g., theme settings

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_settings');
    }
};
