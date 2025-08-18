<?php

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
        // categories
        Schema::create('courses.categories', function (Blueprint $table) {
            $table->id();
            $table->string('title_uz');
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->string('slug')->unique();

            $table->foreignId('parent_id')->nullable()
                ->constrained('courses.categories')->nullOnDelete();
            $table->timestamps();
        });


        Schema::create('courses.category_course', function (Blueprint $table) {
            $table->foreignId('course_id')->constrained('courses.courses')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('courses.categories')->onDelete('cascade');

            // составной ключ вместо id
            $table->primary(['course_id', 'category_id']);

            $table->timestamps();
        });


//        // TAGS
//        Schema::create('tags', function (Blueprint $table) {
//            $table->id();
//            $table->string('title');
//            $table->string('slug')->unique();
//            $table->timestamps();
//        });
//
//        Schema::create('course_tag', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('course_id')->constrained()->onDelete('cascade');
//            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
//            $table->unique(['course_id', 'tag_id']);
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP TABLE IF EXISTS courses.category_courses CASCADE');
        DB::statement('DROP TABLE IF EXISTS courses.categories CASCADE');
        DB::statement('DROP TABLE IF EXISTS courses.category_translations CASCADE');

    }
};
