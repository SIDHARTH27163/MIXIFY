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
        Schema::create('friend_follower_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->enum('friend_request_permission', ['everyone', 'friends_of_friends', 'no_one'])->default('everyone');
            $table->boolean('approve_followers_manually')->default(false);
            $table->boolean('remove_follower_without_blocking')->default(false);
            $table->enum('default_group_visibility', ['public', 'private', 'secret'])->default('public');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friend_follower_settings');
    }
};
