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
        Schema::create('orders.order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders.orders')->cascadeOnDelete();
            $table->morphs('purchasable');
            $table->unsignedBigInteger('price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders.order_items');
    }
};
