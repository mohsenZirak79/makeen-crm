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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_student_id');
            $table->set('status',['1','2']);
            $table->date('requested_date');
            $table->time('start_time');
            $table->time('requested_time');
            $table->string('description');
            $table->string('admin_comment');
            $table->timestamps();

            $table->foreign('course_student_id')->references('id')->on('course_students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
