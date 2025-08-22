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
        Schema::create('billings.transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users.users")->cascadeOnDelete();
            $table->integer('order_id'); // TODO foreign key with orders table
            $table->bigInteger('amount',);
            $table->string('currency', 3)->default('UZS');


            $table->integer('reason');
            $table->integer('state');
            $table->string('payment_method')->nullable(); //payme, click, uzum
            $table->string('external_id')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings.transactions');
    }
};
