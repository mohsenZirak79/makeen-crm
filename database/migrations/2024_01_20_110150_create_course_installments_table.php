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
        Schema::create('course_installments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_student_id')->nullable();
            $table->integer('tuition');
            $table->integer('during_course_installment_count');
            $table->integer('during_course_installment_amount');
            $table->integer('after_course_installment_count');
            $table->integer('after_course_installment_amount');
            $table->date('after_course_installment_start');
            $table->timestamps();

            $table->foreign('course_student_id')->references('id')->on('course_students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_installments');
    }
};
