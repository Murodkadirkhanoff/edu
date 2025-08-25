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

            $table->foreignId('user_id')->constrained("users.users")->onDelete('cascade');
            //$table->foreignId('order_id')->nullable()->constrained()->onDelete('set null');
            $table->integer('order_id');

            $table->unsignedBigInteger('amount');
            $table->string('currency', 10)->default('UZS');

            $table->enum('status', ['pending', 'processing', 'paid', 'canceled', 'failed'])->default('pending');

            $table->string('provider'); // payme, click, paypal и т.д.
            $table->string('provider_transaction_id')->nullable()->index(); // например payme_id
            $table->unsignedBigInteger('provider_created_at')->nullable();  // Payme "time"
            $table->string('provider_state')->nullable(); // например Payme.state = 1,2,-1

            $table->unsignedBigInteger('performed_at')->nullable();
            $table->unsignedBigInteger('canceled_at')->nullable();

            $table->string('reason')->nullable();

            $table->jsonb('provider_payload')->nullable(); // "сырые" данные для истории

            $table->morphs('transactionable');

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
