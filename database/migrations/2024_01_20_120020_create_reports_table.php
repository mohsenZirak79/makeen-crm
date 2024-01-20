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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_student_id');
            $table->date('date');
            $table->string('admin_comment');
            $table->string('mentor_comment');
            $table->set('overall_status',['1','2']);
            $table->set('time_status',['1','2']);
            $table->timestamps();

            $table->foreign('course_student_id')->references('id')->on('course_students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
