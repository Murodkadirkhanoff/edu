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
        DB::statement('CREATE SCHEMA IF NOT EXISTS courses;');
        DB::statement('CREATE SCHEMA IF NOT EXISTS lessons;');
        DB::statement('CREATE SCHEMA IF NOT EXISTS users;');
        DB::statement('CREATE SCHEMA IF NOT EXISTS media;');
        DB::statement('CREATE SCHEMA IF NOT EXISTS billings;');
        DB::statement('CREATE SCHEMA IF NOT EXISTS orders;');
//        DB::statement('CREATE SCHEMA IF NOT EXISTS quizzes;');
//        DB::statement('CREATE SCHEMA IF NOT EXISTS certificates;');
//        DB::statement('CREATE SCHEMA IF NOT EXISTS payments;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP SCHEMA IF EXISTS courses CASCADE;');
        DB::statement('DROP SCHEMA IF EXISTS lessons CASCADE;');
        DB::statement('DROP SCHEMA IF EXISTS users CASCADE;');
        DB::statement('DROP SCHEMA IF EXISTS media CASCADE;');
        DB::statement('DROP SCHEMA IF EXISTS billings CASCADE;');
        DB::statement('DROP SCHEMA IF EXISTS orders CASCADE;');
//        DB::statement('DROP SCHEMA IF EXISTS quizzes CASCADE;');
//        DB::statement('DROP SCHEMA IF EXISTS certificates CASCADE;');
//        DB::statement('DROP SCHEMA IF EXISTS payments CASCADE;');
    }
};
