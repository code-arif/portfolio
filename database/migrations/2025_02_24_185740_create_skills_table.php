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
            $table->string('title');
            $table->string('short_description');
            $table->text('long_description');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('language_or_key')->nullable();
            $table->string('category')->nullable();
            $table->string('certificate')->nullable();
            $table->string('batch_no')->nullable();
            $table->string('institute')->nullable();
            $table->string('trainer')->nullable();
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
