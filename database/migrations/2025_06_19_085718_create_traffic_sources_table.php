<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
//        Schema::create('traffic_sources', function (Blueprint $table) {
//            $table->id();
//            $table->uuid('tracking_id')->unique();
//            $table->string('source')->default(\App\Enums\TrafficSource::DIRECT->value);
//            $table->string('ref_code')->nullable(); // для referral
//            $table->jsonb('campaign_name')->nullable(); // Telegram, Instagram, Kun Uz
//            $table->string('campaign_code')->nullable(); // telegram, instagram, kunuz
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traffic_sources');
    }
};
