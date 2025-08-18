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
        Schema::create('media.files', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('path');
            $table->string('type');
            $table->string('disk')->default('local');

            $table->nullableMorphs('fileable');

            $table->string('original_name')->nullable();
            $table->string('extension')->nullable();
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('file_size')->nullable();
            $table->timestamp('expires_at')->nullable();

            $table->foreignId('user_id')->nullable()->constrained('users.users')->nullOnDelete(); // sertifikat user va course ga biriktiriladi
            $table->foreignId('uploaded_by')->nullable()->constrained('users.users')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media.files');
    }
};
