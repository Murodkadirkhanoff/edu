<?php

use App\Enums\CourseLevel;
use App\Enums\CourseStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses.courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instructor_id')->constrained('users.users')->onDelete('cascade');
            $table->text('title');
            $table->text('description')->nullable();
            $table->integer('lang_id');
            $table->unsignedTinyInteger('course_level_id');

            $table->boolean('is_whole_purchase_available')->default(true);
            $table->boolean('is_lesson_purchase_available')->default(false);
            $table->unsignedBigInteger('whole_price_minor')->default(0); // TIYINDA SAQLAYDI - 1000 UZS = 1000 00 price_minor
            $table->unsignedBigInteger('lesson_price_minor')->default(0);
            $table->tinyInteger('status')->default(0); // enum в PHP
            $table->integer('total_video_duration_seconds')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP TABLE IF EXISTS courses.courses CASCADE');

    }
};
