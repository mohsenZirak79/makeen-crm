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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_category_id');
            $table->integer('course_number');
            $table->unsignedBigInteger('mentor_id');
            $table->integer('student_count');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('mentor_id')->references('id')->on('users');
            $table->foreign('sub_category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
