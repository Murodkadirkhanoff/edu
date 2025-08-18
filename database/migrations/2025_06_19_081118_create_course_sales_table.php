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
//        Schema::create('course_sales', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('course_id')->constrained()->onDelete('cascade');
//            $table->foreignId('user_id')->constrained(); // покупатель
//            $table->uuid('tracking_id')->nullable(); // связан с traffic_sources.tracking_id
//            $table->decimal('price', 12);
//            $table->decimal('instructor_earnings', 12);
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_sales');
    }
};
