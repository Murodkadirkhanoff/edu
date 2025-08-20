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
        Schema::create('users.social_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users.users')->onDelete('cascade');
            $table->string('twitter_profile')->nullable();
            $table->string('telegram_profile')->nullable();
            $table->string('facebook_profile')->nullable();
            $table->string('instagram_profile')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->string('youtube_profile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users.social_profiles');
    }
};
