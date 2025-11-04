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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users','id')->cascadeOnDelete();
           $table->foreignId('faculty_id')->constrained('faculties')->cascadeOnDelete();
            $table->string('title');
            $table->string('author')->nullable();
            $table->string('image');
            $table->string('cover_image')->nullable();
            $table->enum('condition', ['جديد', 'مستعمل'])->default('جديد');
            $table->enum('status', ['متوفر', 'غير متوفر'])->default('متوفر');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
