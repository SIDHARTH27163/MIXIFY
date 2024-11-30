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
         Schema::create('notification_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('push_likes')->default(false);
            $table->boolean('push_comments')->default(false);
            $table->boolean('push_shares')->default(false);
            $table->boolean('push_messages')->default(false);
            $table->boolean('push_friend_requests')->default(false);
            $table->boolean('push_follower_updates')->default(false);
            $table->boolean('email_weekly_summary')->default(false);
            $table->boolean('email_security_alerts')->default(false);
            $table->boolean('email_updates_followed')->default(false);
            $table->boolean('inapp_mentions')->default(false);
            $table->boolean('inapp_tagged')->default(false);
            $table->boolean('sound')->default(true);
            $table->boolean('vibrate')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_settings');
    }
};
