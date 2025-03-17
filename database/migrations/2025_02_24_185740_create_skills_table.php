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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('prefix')->nullable();
            $table->string('title');
            $table->string('preposition')->nullable();
            $table->string('suffix')->nullable();
            $table->string('conjunction')->nullable();
            $table->string('short_description');
            $table->text('long_description');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('language_or_key')->nullable();
            $table->string('category')->nullable();
            $table->string('certificate_image')->nullable();
            $table->string('certificate_link')->nullable();
            $table->string('progress_certificate')->nullable();
            $table->string('batch_no')->nullable();
            $table->string('batch_name')->nullable();
            $table->string('student_id')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('institute_branch')->nullable();
            $table->string('institute_website')->nullable();
            $table->string('trainer_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
