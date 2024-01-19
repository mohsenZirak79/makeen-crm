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
        Schema::disableForeignKeyConstraints();
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('personal_data_id');
            $table->unsignedBigInteger('home_data_id');
            $table->unsignedBigInteger('military_service_data_id');
            $table->unsignedBigInteger('education_data_id');
            $table->unsignedBigInteger('course_data_id');
            $table->unsignedBigInteger('app_experience_data_id');
            $table->unsignedBigInteger('foreign_languages_data_id');
            $table->unsignedBigInteger('representative_data_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('personal_data_id')->references('id')->on('personal_data');
            $table->foreign('home_data_id')->references('id')->on('home_data');
            $table->foreign('military_service_data_id')->references('id')->on('military_service_data');
            $table->foreign('education_data_id')->references('id')->on('education_data');
            $table->foreign('course_data_id')->references('id')->on('course_data');
            $table->foreign('app_experience_data_id')->references('id')->on('app_experience_data');
            $table->foreign('foreign_languages_data_id')->references('id')->on('foreign_languages_data');
            $table->foreign('representative_data_id')->references('id')->on('representative_data');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data');
    }
};
