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
        Schema::create('privacy_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->boolean('profile_visibility')->default(1); // 1: Public, 0: Private
            $table->string('last_seen_visibility')->default('everyone'); // ['everyone', 'friends', 'nobody']
            $table->boolean('activity_status')->default(1); // 1: Enabled, 0: Disabled
            $table->string('content_visibility')->default('everyone'); // ['everyone', 'friends', 'only_me']
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privacy_settings');
    }
};
