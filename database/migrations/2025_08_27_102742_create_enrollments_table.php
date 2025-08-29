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
        Schema::create('users.enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users.users')->cascadeOnDelete();
            $table->morphs('purchasable');

            // purchase | free | gift | subscription
            $table->string('access_type')->default('purchase');
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('expires_at')->nullable();

            // active | expired | revoked
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users.enrollments');
    }
};
