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
        Schema::create('performance_overviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_student_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('technical_score');
            $table->integer('attendance_score');
            $table->integer('reporting_score');
            $table->integer('system_compatibility');
            $table->string('admin_comment');
            $table->string('mentor_comment');
            $table->boolean('is_visible_for_user');
            $table->timestamps();

            $table->foreign('course_student_id')->references('id')->on('course_students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_overviews');
    }
};
