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
        Schema::create('mentor_weekly_student_score', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_student_id');
            $table->integer('technical_score');
            $table->integer('week_number');
            $table->timestamps();

            $table->foreign('course_student_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_weekly_student_score');
    }
};
