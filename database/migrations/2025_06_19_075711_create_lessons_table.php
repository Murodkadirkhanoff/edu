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
        Schema::create('lessons.lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained('courses.course_modules')->onDelete('cascade');
            $table->text('title');
            $table->unsignedBigInteger('price')->default(0);
            $table->boolean('is_free')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->longText('text_content')
                ->nullable();
            $table->smallInteger('type');
            $table->smallInteger('status')->default(\App\Enums\LessonStatus::PENDING->value); // pending, processing, ready
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons.lessons');


    }
};
