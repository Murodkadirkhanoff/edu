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
        Schema::create('orders.orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained("users.users")
                ->nullOnUpdate()
                ->nullOnDelete();

            $table->foreignId('course_id')
                ->constrained("courses.courses")
                ->nullOnUpdate()
                ->nullOnDelete();

            // Сумма транзакции (в тийинах/центах для точности)
            $table->unsignedBigInteger('amount');

            // Валюта
            $table->string('currency', 3)->default('UZS');

            // Уникальный ID транзакции на стороне Paycom
            $table->string('provider_transaction_id')->nullable()->unique();

            // Статус транзакции: pending, paid, cancelled, failed
            $table->enum('status', ['pending', 'paid', 'cancelled', 'failed'])->default('pending');

            // Доп. данные (JSON)
            $table->json('meta')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
