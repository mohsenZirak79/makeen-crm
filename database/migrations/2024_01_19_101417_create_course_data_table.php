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
        Schema::create('course_data', function (Blueprint $table) {
            $table->softDeletes();
            $table->id();
            $table->unsignedBigInteger('user_data_id');
            $table->string('title');
            $table->date('start_date');
            $table->float('course_length');
            $table->string('academy_name');
            $table->text('description');
            $table->timestamps();

            $table->foreign('user_data_id')->references('id')->on('user_data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_data');
    }
};
